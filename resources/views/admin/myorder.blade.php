@extends(backpack_view('blank'))

@section('content')

    

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
