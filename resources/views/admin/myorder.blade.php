@extends(backpack_view('blank'))

@section('content')

    {{-- Modal --}}
    <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
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

    <div class="contiainer">
        <div class="card">
            {{-- card head --}}
            <div class="card-header">
                {{-- navs and tabs --}}
                <ul class="nav nav-tabs card-header-tabs nav-fill" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tabs-to-ship" class="nav-link active" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-dolly-flatbed fs-1"></i>
                                <span class="d-none d-md-inline">To Ship</span>
                            </span>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-to-receive" class="nav-link" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-shipping-fast"></i>
                                <span class="d-none d-md-inline">To Receive</span>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tabs-delivered" class="nav-link" data-bs-toggle="tab">
                            <span class="fs-2 fw-bold">
                                <i class="la la-box fs-1"></i>
                                <span class="d-none d-md-inline">Delivered</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- card body --}}
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tabs-to-ship">
                        <div class="col-12">
                            <div class="card" style="height: 28rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <img src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                                        alt="product image" width="90" height="90">
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Black Shoes XL</strong>
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                    <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                        <div>$100</div>
                                                        <div>Qty: 1</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    {{-- <div class="badge bg-primary">To ship</div> --}}
                                                </div>
                                                <div class="d-flex justify-content-end mt-3 mr-4">
                                                    <a href="#" class="btn btn-outline-primary">Cancel Order</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <span class="avatar">JL</span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a
                                                            witch."</strong> post.
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="badge bg-primary"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="tabs-to-receive">
                        <div class="col-12">
                            <div class="card" style="height: 28rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <img src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                                        alt="product image" width="90" height="90">
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Black Shoes XL</strong>
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                    <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                        <div>$100</div>
                                                        <div>Qty: 1</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    {{-- <div class="badge bg-primary">To ship</div> --}}
                                                </div>
                                                <div class="d-flex justify-content-end mt-3 mr-4">
                                                    <a href="#" class="btn btn-outline-primary disabled"
                                                        aria-disabled="true">Cancel Order</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <span class="avatar">JL</span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a
                                                            witch."</strong> post.
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="badge bg-primary"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-delivered">
                        <div class="col-12">
                            <div class="card" style="height: 28rem">
                                <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                                    <div class="divide-y">
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <img src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                                        alt="product image" width="90" height="90">
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Black Shoes XL</strong>
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                    <div class=" d-flex justify-content-between mt-4 fs-3 fw-bold">

                                                        <div>$100</div>
                                                        <div>Qty: 1</div>
                                                    </div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    {{-- <div class="badge bg-primary">To ship</div> --}}
                                                </div>
                                                <div class="d-flex justify-content-end mt-3 mr-4">
                                                    <a href="#" class="btn btn-primary">Order Received</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <span class="avatar">JL</span>
                                                </div>
                                                <div class="col">
                                                    <div class="text-truncate">
                                                        <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a
                                                            witch."</strong> post.
                                                    </div>
                                                    <div class="text-secondary">yesterday</div>
                                                </div>
                                                <div class="col-auto align-self-center">
                                                    <div class="badge bg-primary"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
