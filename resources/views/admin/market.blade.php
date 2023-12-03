@extends(backpack_view('blank'))

@php
    $products = App\Models\Product::all();

    $categories = App\Models\Category::all();

    $ratings = App\Models\Rating::all();

@endphp

@section('content')
    <div class="page-wrapper">

        <!-- Page header -->
        <div class="page-header d-print-none">

            <!-- Page body -->
            <div class="page-body">
                <div class="container-lg">
                    <div class="d-flex flex-md-row flex-column align-items-center">
                        <div class="display-3">
                            DHVSU
                        </div>
                        <div class="display-5 mx-2">
                            Marketplace
                        </div>
                    </div>
                    <div class="row g-2 align-items-center">
                        <div class="input-icon">
                            <input type="text" value="" class="form-control form-control-rounded"
                                placeholder="Search…">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                </svg>
                            </span>
                        </div>
                        {{-- <div class="col">
                            <h2 class="page-title">
                                Search results
                            </h2>
                            <div class="text-secondary mt-1">About 2,410 result (0.19 seconds)</div>
                        </div> --}}
                    </div>

                    <form action="{{backpack_url('market_search')}}" method="get" autocomplete="off" novalidate="" class="my-4">
                        <div class="row row-cols-auto row-cols-sm-1 row-cols-md-4 ">

                            <div class="col col-md-4 col-sm-12">
                                <label for="select-category" class="form-label">Product Category</label>
                                <select name="select-category" id="select-category">
                                    @foreach ($categories as $categrory)
                                        <option value="{{ $categrory->id }}">{{ $categrory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col col-sm-2">
                                <label for="select-rating" class="form-label">Rating</label>
                                <select name="select-rating" id="select-rating">
                                    @foreach ($ratings as $rating)
                                        <option value="{{ $rating->id }}">{{ $rating->name }} {{$rating->rating}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col  col-sm-2">
                                <label for="select-price" class="form-label">Product Price</label>
                                <select name="select-price" id="select-price">
                                    <option value="1">Lowest to Highest</option>
                                    <option value="2">Highest to Lowest</option>
                                </select>
                            </div>
                            <div class="col-auto mt-5">
                                <button class="btn btn-primary w-100" type="submit">
                                    Confirm changes
                                </button>
                                <button class="btn btn-outline-primary w-100" type="reset">
                                    Reset to defaults
                                </button>
                                {{-- <a href="#" class="btn btn-outline-primary w-100 mt-3" type="">
                                    Reset to defaults
                                </a> --}}
                            </div>

                        </div>
                    </form>

                    <div class="row g-0 gx-md-3 gy-md-4">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card" style="width: 17rem;">
                                    <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                        class="card-img-top" alt="{{ $product->name }}" width="220" height="220">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="card-text">₱{{ $product->price }}</p>

                                            <small class="text-secodary">{{ $product->stock }} left</small>
                                        </div>
                                        <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                            class="btn btn-primary text-wrap w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-9">
                            <div class="row row-cards row-md-4">



                            </div>
                        </div>
                        {{-- <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm" style="height: 280px;">
                                        <a href="#" class="d-block"><img
                                                src="./static/photos/beautiful-blonde-woman-relaxing-with-a-can-of-coke-on-a-tree-stump-by-the-beach.jpg"
                                                class="card-img-top"></a>
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <span class="avatar me-3 rounded"
                                                    style="background-image: url(./static/avatars/000m.jpg)"></span>
                                                <div>
                                                    <div>Paweł Kuna</div>
                                                    <div class="text-secondary">3 days ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                        {{-- 
                        <div class="container">
                            <div class="row row-cols-auto justify-content-center">
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="card" style="width: 17rem;">
                                        <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                            class="card-img-top" alt="{{ $product->name }}" width="220" height="220">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <div class="d-flex flex-row justify-content-between">
                                                <p class="card-text">₱{{ $product->price }}</p>

                                                <small class="text-secodary">{{ $product->stock }} left</small>
                                            </div>
                                            <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                                class="btn btn-primary text-wrap w-100">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
