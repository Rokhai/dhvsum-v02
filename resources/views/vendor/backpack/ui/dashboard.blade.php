@extends(backpack_view('blank'))


@php


    // $products = App\Models\Product::all();
    
    
    
    // $products = App\Models\Product::paginate(10);
    // $product = App\Models\Product::first();
    $product = App\Models\Product::orderBy('created_at', 'desc')->first();



@endphp

{{-- @extends(backpack_view('blank')) --}}

@section('content')
    <div class=" w-100 h-100 mb-5 mt-5 ">
        <div class="d-flex flex-sm-columns align-items-center container ">
            <div class="w-75">
                <h1 class="display-1 fw-bolder">DHVSUM</h1>
                <h2 class="display-3">Don Honorio Ventura State University Marketplace</h2>
                <p class="lead fs-2 lh-5">
                    This web system marketplace is only available within the premise of Don Honorio Ventura State
                    University, where the Users are able to post their items or products such as their used P.E. Uniforms,
                    College Uniforms, University Logo Patches, and this will not only limited products, but also services
                    are included. This will be a localize platform for student to build communal economy if its for funds of
                    student organizations among colleges. This will be potentially beneficial in College of Business Studies
                    to market their products if its for thesis or projects.
                </p>

                <a href="{{ backpack_url('market') }}" class="btn btn-primary btn-large mt-3 p-3 fs-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="48"
                        height="48" viewBox="0 0 20 20" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 17h-11v-14h-2" />
                        <path d="M6 5l14 1l-1 7h-13" />
                    </svg>
                    Shop Now
                </a>
                {{-- Modal Button For About US --}}
                {{-- <div class="mt-5 pt-5">
                    <a href="#" class="fs-3" data-bs-toggle="modal" data-bs-target="#modal-simple">
                        About Us
                    </a>
                </div> --}}
                {{-- Modal For About US --}}
                <div class="modal modal-blur fade" id="modal-simple" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">About US</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                We are Computer Science Student of Don Honorio Ventura State University, this is our final
                                project for our Web Development Subject.
                                {{-- This is Web Marketplace to cater a platform for students to sell their products and services
                                within the premise of Don Honorio Ventura State University. --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg --}}
    {{-- https://holsel.com/wp-content/uploads/products/LYX18F002/LYX18F002-Tan-1.jpg --}}
    {{-- https://ae01.alicdn.com/kf/HTB1X5VkiInI8KJjSsziq6z8QpXaS/ZJNNK-Hot-Sale-Men-Summer-Shoes-Breathable-Male-Casual-Shoes-Fashion-Chaussure-Homme-Soft-Zapatos-Hombre.jpg --}}
    {{-- sample image --}}
    {{-- Newest Product Carousel --}}
    <div class="my-5 mx-auto pt-5">
        <h2 class="container my-5 fw-bold">Newest</h2>
        {{-- carousel-dark makes the button dark --}}
        <div id="carousel-newest-product" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner w-75 mx-auto">
                <div class="carousel-item active " data-bs-interval="10000">
                    {{-- src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg" --}}
                    {{-- src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg" --}}
                    <div class="container">
                        <div class="row row-cols-auto justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-12 ">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('/storage/uploads/products/' . $product->image) }}" class="card-img-top" alt="{{$product->name}}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$product->name}}</h5>
                                        <p class="card-text">₱{{$product->price}}</p>
                                        {{-- <a href="{{ backpack_url('view-product/' . $product->id . '/show') }}" class="btn btn-primary">View</a> --}}
                                        <a href="{{backpack_url('view_product/'. $product->id) }}" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Second --}}
                <div class="carousel-item " data-bs-interval="5000">
                    <div class="container">
                        <div class="row row-cols-auto justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Carousel Controller --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-newest-product"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-newest-product"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="my-5 mx-auto pt-5">
        <h2 class="container my-5 fw-bold">Hot Choice</h2>
        <div id="carousel-hot-choice" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner w-75 mx-auto">
                <div class="carousel-item active " data-bs-interval="10000">
                    <div class="container">
                        <div class="row row-cols-auto justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Second --}}
                <div class="carousel-item " data-bs-interval="5000">
                    <div class="container">
                        <div class="row row-cols-auto justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 d-none d-lg-block">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="https://www.webstaurantstore.com/images/products/extra_large/472039/1751150.jpg"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5 class="card-title">Product Title</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">
                                                $100
                                            </p>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <a href="#" class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Carousel Controller --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-hot-choice"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-hot-choice"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection
