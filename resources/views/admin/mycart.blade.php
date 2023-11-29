@extends(backpack_view('blank'))

@php
    $product = App\Models\Product::first();
@endphp

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the cart items -->
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price * $product->stock }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#placeOrder">Place Order</button>
                    <a href="#" class="btn btn-danger">Remove</a>
                </td>
                {{-- @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price * $item->quantity }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Update</a>
                            <a href="#" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>



    {{-- Modal --}}
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
