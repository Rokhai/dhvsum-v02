@extends(backpack_view('blank'))


@php
    $newest1_1 = \App\Models\Product::first();
    $productsSmNewest = \App\Models\Product::orderBy('created_at', 'desc')
        ->paginate(10)
        ->skip(1);

    $newest1 = \App\Models\Product::orderBy('created_at', 'desc')
        ->paginate(10)
        ->take(4);
    $newest2 = \App\Models\Product::orderBy('created_at', 'desc')
        ->paginate(10)
        ->skip(1)
        ->take(4);

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

    {{-- carousel-dark makes the button dark --}}
    {{-- Newest Product Carousel --}}
    {{-- SM DISPLAY --}}
    <div class="my-5 mx-auto pt-5 d-lg-none d-sm-block">
        <h2 class="container my-5 fw-bold">Newest</h2>
        <div id="carousel-sm-newest-product" class="carousel carousel-dark slide  d-lg-none d-sm-block"
            data-bs-ride="carousel">
            <div class="carousel-inner w-75 mx-auto">
                <div class="carousel-item  active" data-bs-interval="5000">
                    <div class="container">
                        <div class="row row-cols-auto justify-content-center">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card" style="width: 17rem;">
                                    <img src="{{ asset('/storage/uploads/products/' . $newest1_1->image) }}"
                                        class="card-img-top" alt="{{ $newest1_1->name }}" width="220" height="220">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $newest1_1->name }}</h5>
                                        @php

                                            $maxRatingCount = \DB::table('feedback')
                                                ->select('rating_id', \DB::raw('count(*) as total'))
                                                ->where('product_id', $newest1_1->id)
                                                ->groupBy('rating_id')
                                                ->orderBy('total', 'desc')
                                                ->first();
                                            $maxRating = \DB::table('feedback')
                                                ->where('product_id', $newest1_1->id)
                                                ->orderBy('rating_id', 'desc')
                                                ->where('rating_id', '=', $maxRatingCount->rating_id)
                                                ->first();
                                        @endphp

                                        <p>{{ $maxRating->rating }}</p>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">₱{{ number_format($newest1_1->price, 2, '.', ',') }}</p>

                                            <small class="text-secodary">{{ $newest1_1->stock }} left</small>
                                        </div>
                                        <a href="{{ backpack_url('view_product/' . $newest1_1->id) }}"
                                            class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($productsSmNewest as $product)
                    <div class="carousel-item  " data-bs-interval="5000">
                        <div class="container">
                            <div class="row row-cols-auto justify-content-center">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 17rem;">
                                        <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                            class="card-img-top" alt="{{ $product->name }}" width="220" height="220">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            @php
                                                $maxRatingCount = \DB::table('feedback')
                                                    ->select('rating_id', \DB::raw('count(*) as total'))
                                                    ->where('product_id', $product->id)
                                                    ->groupBy('rating_id')
                                                    ->orderBy('total', 'desc')
                                                    ->first();
                                                $maxRating = \DB::table('feedback')
                                                    ->where('product_id', $product->id)
                                                    ->orderBy('rating_id', 'desc')
                                                    ->where('rating_id', '=', $maxRatingCount->rating_id)
                                                    ->first();
                                            @endphp

                                            <p>{{ $maxRating->rating }}</p>
                                            <div class="d-flex flex-row justify-content-between">
                                                <p class="card-text">₱{{ number_format($product->price, 2, '.', ',') }}</p>

                                                <small class="text-secodary">{{ $product->stock }} left</small>
                                            </div>
                                            <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                                class="btn btn-primary text-wrap w-100">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Carousel Controller --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-sm-newest-product"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-sm-newest-product"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- LG DISPLAY --}}
    <div class="my-5 mx-auto pt-5 d-none d-lg-block">
        <h2 class="container my-5 fw-bold">Newest</h2>


        <div id="carousel-newest-product" class="carousel carousel-dark slide " data-bs-ride="carousel">
            <div class="carousel-inner w-75 mx-auto">
                <div class="carousel-item active " data-bs-interval="5000">
                    <div class="container">
                        <div class="row row-cols-4 justify-content-center">
                            @foreach ($newest1 as $product)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 17rem;">
                                        <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                            class="card-img-top" alt="{{ $product->name }}" width="220"
                                            height="200">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            @php
                                                $maxRatingCount = \DB::table('feedback')
                                                    ->select('rating_id', \DB::raw('count(*) as total'))
                                                    ->where('product_id', $product->id)
                                                    ->groupBy('rating_id')
                                                    ->orderBy('total', 'desc')
                                                    ->first();
                                                $maxRating = \DB::table('feedback')
                                                    ->where('product_id', $product->id)
                                                    ->orderBy('rating_id', 'desc')
                                                    ->where('rating_id', '=', $maxRatingCount->rating_id)
                                                    ->first();
                                            @endphp

                                            <p>{{ $maxRating->rating }}</p>
                                            <div class="d-flex flex-row justify-content-between">
                                                <p class="card-text">₱{{ number_format($product->price, 2, '.', ',') }}
                                                </p>

                                                <small class="text-secodary">{{ $product->stock }} left</small>
                                            </div>
                                            <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                                class="btn btn-primary text-wrap w-100">View this product</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Second --}}
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="container">
                        <div class="row row-cols-4 justify-content-center">
                            @foreach ($newest2 as $product)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 17rem;">
                                        <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                            class="card-img-top" alt="{{ $product->name }}" width="220"
                                            height="220">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            @php
                                                $maxRatingCount = \DB::table('feedback')
                                                    ->select('rating_id', \DB::raw('count(*) as total'))
                                                    ->where('product_id', $product->id)
                                                    ->groupBy('rating_id')
                                                    ->orderBy('total', 'desc')
                                                    ->first();
                                                $maxRating = \DB::table('feedback')
                                                    ->where('product_id', $product->id)
                                                    ->orderBy('rating_id', 'desc')
                                                    ->where('rating_id', '=', $maxRatingCount->rating_id)
                                                    ->first();
                                            @endphp

                                            <p>{{ $maxRating->rating }}</p>
                                            <div class="d-flex flex-row justify-content-between">
                                                <p class="card-text">₱{{ number_format($product->price, 2, '.', ',') }}
                                                </p>

                                                <small class="text-secodary">{{ $product->stock }} left</small>
                                            </div>
                                            <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                                class="btn btn-primary text-wrap w-100">View this product</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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

@endsection
