@extends(backpack_view('blank'))

@section('content')
    @php
        // $product = App\Models\Product::first();

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        $address = \App\Models\Address::where('user_id', backpack_user()->id)->first();

        $cartItems = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->select('products.image', 'products.name', 'products.price', 'carts.user_id', 'carts.product_id', 'carts.id', 'carts.quantity', 'carts.created_at')
            ->where('carts.user_id', '=', backpack_user()->id)
            ->where('carts.is_checked_out', '=', '0')
            ->get();
        // dd($cartItems);
    @endphp
    <div class="d-none">

        @if (Alert::has('success'))
            {{ Alert::first('success') }}
        @endif
        @if (Alert::has('error'))
            {{ Alert::first('error') }}
        @endif
    </div>
    <div class="container-sm">

        {{-- Address --}}
        <div class="col-12 mb-3">
            <div class="card p-3">
                <div id="add-address">
                    <div class= "d-flex flex-column flex-md-row justify-content-between">

                        <h3>Address Information</h3>
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                            data-bs-target="#addAddressModal">Add Address</button>
                    </div>

                </div>
                <div id="view-address">
                    <div class=" d-flex flex-column flex-md-row justify-content-between">

                        @if ($address)
                            <a href="#viewAddressModal" data-bs-toggle="modal" data-bs-target="#viewAddressModal"
                                class="d-inline d-sm-block link-offset-2 link-underline link-underline-opacity-50">
                                {{-- <h4>{{ $address->address }}</h4> --}}
                                <p class="text-muted">{{ $address->fullname }}, {{ $address->address }}</p>
                            </a>
                            {{-- d-flex justify-content-md-end justify-content-sm-evenly --}}
                            <div class="">

                                <button type="button" class="btn btn-outline-danger mx-1" data-bs-toggle="modal"
                                    data-bs-target="#deleteAddressModal">Delete</button>
                                <button type="button" class="btn btn-primary mx-1" data-bs-toggle="modal"
                                    data-bs-target="#updateAddressModal">Update</button>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- <div>
                    dsalkshdajhskd
                </div> --}}
            </div>
            <script>
                function addAddress() {
                    var add_address = document.getElementById('add-address');
                    add_address.classList.add('d-none');

                }

                function viewAddress() {
                    var view_address = document.getElementById('view-address');
                    view_address.classList.remove('d-none');
                }
            </script>

            @php
                if ($address) {
                    // this hide the add address
                    echo '<script>
                        addAddress();
                    </script>';
                } else {
                    // this show the existing address
                    echo '<script>
                        viewAddress();
                    </script>';
                    // echo '<button type="button" class="btn btn-primary" onclick="addAddress()">Add Address</button>';
                }
            @endphp
        </div>

        {{-- Cart Items --}}
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
                                            {{-- <div class="col-auto align-self-center">
                                                <div class="badge bg-primary">To ship</div>
                                            </div> --}}
                                        </div>
                                        <div class="text-secondary">
                                            {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                        <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                            <div>&#8369;{{ $item->price }}</div>
                                            <div>Qty: {{ $item->quantity }}</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3 mr-4">
                                        <button type="button" class="btn btn-outline-danger mx-3"
                                            onclick="confirmDelete({{ $item->id }})">
                                            {{-- <span><i class="la la-trash"> </i>Remove</span> --}}
                                            <span>Remove</span>
                                        </button>
                                        {{-- <a href="#" class="btn btn-outline-danger mx-3"> <i class="la la-trash"></i> Remove</a> --}}
                                        {{-- <a href="#" class="btn btn-primary mx-3">Place Order</a> --}}
                                        <button type="button" class="btn btn-primary"
                                            onclick="checkOut(
                                                {{ $item->id }},
                                                {{ $item->user_id }},
                                                {{ $item->product_id }},
                                                '{{ $item->image }}',
                                                '{{ $item->name }}',
                                                {{ $item->price }},
                                                {{ $item->quantity }},
                                                {{ $item->price * $item->quantity }}
                                                )">
                                            <span>Place Order</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Check Out Modal --}}
    <div class="modal fade" id="checkOut" tabindex="-1" aria-labelledby="checkOut" aria-hidden="true">
        <!-- Info Modal Dialog -->
        @if (!empty($address))
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkOut">Oreder Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-status "></div>
                    <form action="" method="POST" id="formCheckOut">
                        @csrf
                        @method('POST')
                        <div class="modal-body text-start py-4">
                            <div>
                                <div class="row ">
                                    <div class="col-auto">
                                        {{-- "{{ asset('/storage/uploads/products/' . $item->image) }}" --}}
                                        <img src="" id="itemImage" alt="product image" width="90"
                                            height="90">
                                    </div>
                                    <div class="col">
                                        <div class="text-truncate">
                                            <strong id="itemName"></strong>
                                        </div>
                                        <div class=" d-flex justify-content-between mt-4 ">

                                            <div id="itemPrice">&#8369; 1</div>
                                            <div id=itemQuantity>Qty: 1</div>
                                        </div>
                                        <div id="itemTotalAmount" class="my-3 fs-3 fw-bold">
                                            Total Amount: &#8369; 1000
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-label">Payment Method</div>
                                            <div>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="payment_method"
                                                        checked="" value="gcash">
                                                    <span class="form-check-label">GCash</span>
                                                </label>
                                                <label class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="payment_method" value="cash">
                                                    <span class="form-check-label">Cash-in-Hand</span>
                                                </label>

                                            </div>
                                            <div id="gcash-info" style="display: block;" class="form-group">
                                                <label for="gcash-number">GCash Number:</label>
                                                <input type="text" id="gcash-number" name="gcash_number" class="form-control" maxlength="11">
                                            </div>
                                            <script>

                                                document.addEventListener('DOMContentLoaded', function () {
                                                    const paymentMethodInputs = document.querySelectorAll('input[name="payment_method"]');
                                                    const gcashInfo = document.getElementById('gcash-info');
                                                
                                                    paymentMethodInputs.forEach(input => {
                                                        input.addEventListener('change', function () {
                                                            if (this.value === 'gcash') {
                                                                gcashInfo.style.display = 'block';
                                                            } else {
                                                                gcashInfo.style.display = 'none';
                                                            }
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>

                                        <div class="col">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="item_cart_id" id="item_id" value="">
                            <input type="hidden" name="item_user_id" id="item_user_id" value="">
                            <input type="hidden" name="item_product_id" id="item_product_id" value="">
                            <input type="hidden" name="item_address_id" id="item_address_id"
                                value="{{ optional($address)->id }}">
                            <input type="hidden" name="item_total_amount" id="item_total_amount" value="">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Check Out</button>
                    </form>
                </div>
            </div>
    </div>
@else
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkOut">Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-status bg-warning"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-warning icon-lg" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3>Notice!</h3>
                <div class="text-secondary text-wrap">
                    Your address is not yet setup, please add your address/contact first before you can place an
                    order.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    @endif
    </div>

    @if ($address)
        <script>
            function checkOut(itemId, itemUserId, itemProductId, itemImage, itemName, itemPrice, itemQuantity,
                itemTotalAmount) {

                var form = document.getElementById('formCheckOut');
                form.action = "{{ backpack_url('myorder/store') }}";
                document.getElementById('item_id').value = itemId;
                document.getElementById('item_user_id').value = itemUserId;
                document.getElementById('item_product_id').value = itemProductId;
                // document.getElementById('item_address_id').value = itemAddressId;
                document.getElementById('item_total_amount').value = itemTotalAmount;

                document.getElementById('itemImage').src = "{{ asset('/storage/uploads/products') }}" + "/" + itemImage;
                document.getElementById('itemName').innerHTML = itemName;
                document.getElementById('itemPrice').innerHTML = "&#8369; " + itemPrice;
                document.getElementById('itemQuantity').innerHTML = "Qty: " + itemQuantity;
                document.getElementById('itemTotalAmount').innerHTML = "Total Amount: &#8369; " + itemTotalAmount;


                var myModal = new bootstrap.Modal(document.getElementById('checkOut'), {});
                myModal.show();

            }
        </script>
    @else
        <script>
            function checkOut(itemId, itemUserId, itemProductId, itemImage, itemName, itemPrice, itemQuantity,
                itemTotalAmount) {
                var myModal = new bootstrap.Modal(document.getElementById('checkOut'), {});
                myModal.show();
            }
        </script>
    @endif

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
                                    <button type="submit" class="btn btn-danger " id="confirmDeleteButton">
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




    {{-- Add Address Modal --}}
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addToCartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">

            <div class="modal-content">
                <form action="{{ backpack_url('address') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title">Your Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row row-cards">

                            <div class="col-sm-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Fullname" name="fullname">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address" name="address"
                                        value="">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" placeholder="09876543211" maxlength="11"
                                        name="contact_number">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="email@example.com"
                                        name="email" value="{{ backpack_user()->email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- View Address Modal --}}
    <div class="modal fade" id="viewAddressModal" tabindex="-1" aria-labelledby="addToCartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Your Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="row row-cards">

                        <div class="col-sm-6 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="{{ optional($address)->fullname }}"
                                    readonly>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Home Address"
                                    value="{{ optional($address)->address }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" placeholder="+(63) 123 4567 900"
                                    value="{{ optional($address)->contact_number }}" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="email@example.com"
                                    value="{{ optional($address)->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Update Address Modal --}}
    <div class="modal fade" id="updateAddressModal" tabindex="-1" aria-labelledby="addToCartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-center" role="document">

            <div class="modal-content">
                <form action="{{ backpack_url('address/' . optional($address)->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Update your address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row row-cards">

                            <div class="col-sm-6 col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Fullname" name="fullname"
                                        value="{{ optional($address)->fullname }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" placeholder="Home Address"
                                        value="{{ optional($address)->address }}" name="address">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" placeholder="+(63) 98765432100"
                                        value="{{ optional($address)->contact_number }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="email@example.com"
                                        value="{{ optional($address)->email }}" name="email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Address Modal --}}
    <div class="modal" id="deleteAddressModal" tabindex="-1">
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
                    <div class="text-secondary">Do you really want to delete this address? What you've done cannot be
                        undone.
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
                            <form action="{{ backpack_url('address/' . optional($address)->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="col">
                                    <button type="submit" class="btn btn-danger ">
                                        Delete
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
@endsection
