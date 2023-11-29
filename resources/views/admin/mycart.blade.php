@extends(backpack_view('blank'))

@php
    // $product = App\Models\Product::first();

    // $users = DB::table('users')
    //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.*', 'contacts.phone', 'orders.price')
    //     ->get();

    $cartItems = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->select('products.image', 'products.name', 'products.price', 'carts.id', 'carts.quantity', 'carts.created_at')
        ->where('carts.user_id', '=', backpack_user()->id)
        ->where('carts.is_checked_out', '=', '0')
        ->get();
    // dd($cartItems);
@endphp



@section('content')
    <div class="container-sm">
        <div class="col-12">
            <div class="card" style="height: 50rem">
                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                    <div class="divide-y">
                        @foreach ($cartItems as $item)
                            <div>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="{{ asset('/storage/uploads/products/' . $item->image) }}"
                                            alt="product image" width="90" height="90">
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong>{{ $item->name }}</strong>
                                        </div>
                                        <div class="text-secondary">
                                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                        <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                            <div>&#8369;{{ $item->price }}</div>
                                            <div>Qty: {{ $item->quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        {{-- <div class="badge bg-primary">To ship</div> --}}
                                    </div>
                                    <div class="d-flex justify-content-end mt-3 mr-4">
                                        <button type="button" class="btn btn-outline-danger mx-3" 
                                             onclick="confirmDelete({{ $item->id }})">
                                            <span><i class="la la-trash"> </i>{{$item->id}} Remove</span>
                                        </button>
                                        {{-- <a href="#" class="btn btn-outline-danger mx-3"> <i class="la la-trash"></i> Remove</a> --}}
                                        <a href="#" class="btn btn-primary mx-3">Place Order</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- Delet Item in Cart Modal  --}}

    <div class="modal" id="deleteItemModal" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-secondary">Do you really want to remove this? What you've done cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="d-flex flex-row">
                            <div class="col">
                                <a href="#" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                                {{-- <a href="" class="btn btn-danger " id="confirmDeleteButton">
                                    Delete item
                                </a> --}}
                            </div>
                            <form action="" method="POST" id="deleteItemForm">
                                @csrf
                                @method('DELETE')
                                <div class="col">
                                <button type="submit"  class="btn btn-danger "
                                    id="confirmDeleteButton">
                                    Delete item
                                </button>
                                </div>
                            </form>
                            {{-- <div class="col">
                                <button type="submit"  class="btn btn-danger w-100"
                                    id="confirmDeleteButton">
                                    Delete item
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(itemId) {
            // console.log("Function called with item ID: " + itemId);
         

            var form = document.getElementById('deleteItemForm');
            form.action = "{{ backpack_url('mycart/') }}" + "/" + itemId;

            var myModal = new bootstrap.Modal(document.getElementById('deleteItemModal'), {});
            myModal.show();
        }
    </script>

    {{-- Delete Item Modal --}}


    {{-- Place Order Modal --}}
    <div class="modal fade" id="placeOrder" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">

            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Add to cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">


                        <div class="row row-cards">

                            <div class="col-sm-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Company" value="Chet">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" value="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" placeholder="#1234567890" value="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="email@example.com"
                                        value="{{ backpack_user()->email }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection



{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteItemModal">
        Launch alert modal
    </button> --}}

    {{-- <div class="container-sm">
        <div class="card" style="height: 28rem">
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <img src="{{ $product->image }}" alt="product image" width="90" height="90">
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>{{ $product->name }}</strong>
                                </div>
                                <div class="text-secondary">{{ $product->created_at->diffForHumans() }}</div>
                                <div class="d-flex justify-content-between mt-4 fs-3 fw-bold">
                                    <div>${{ $product->price }}</div>
                                    <div>Qty: 1</div>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary">To ship</div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 mr-4">
                                <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-outline-danger mx-3">Remove</a>
                                <a href="{{ route('order.place', $item->id) }}" class="btn btn-primary mx-3">Place Order</a>
                                <a href="#" class="btn btn-outline-danger mx-3">Remove</a>
                                <a href="#" class="btn btn-primary mx-3">Place Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
