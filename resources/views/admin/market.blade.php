@extends(backpack_view('blank'))

@php
    // $products = App\Models\Product::all();

    // $categories = App\Models\Category::all();

    // $ratings = App\Models\Rating::all();
@endphp

@section('content')
    <div class="page-wrapper">

        <!-- Page header -->
        <div class="page-header d-print-none">

            <!-- Page body -->
            <div class="page-body">
                <div class="container-lg ">
                    <div class="d-flex flex-md-row flex-column align-items-center justify-content-between">
                        <div class="d-flex flex-md-row flex-column align-items-center w-auto">
                            <div class="display-3">
                                DHVSU
                                <span class="display-2 text-primary d-none d-sm-none d-md-inline">|</span>
                                {{-- <p class="display-2 text-primary">|</p> --}}
                            </div>
                            <div class="display-5 mx-2">
                                Marketplace
                            </div>
                        </div>

                        <div class="row g-2 align-items-center w-50">
                            <form action="{{ backpack_url('market/search') }}" method="GET">
                                @csrf
                                @method('GET')
                                <div class="input-icon">
                                    <input type="search" value="" name="query"
                                        class="form-control form-control-rounded" placeholder="Search…">
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
                            </form>
                        </div>
                        {{-- <div class="col">
                            <h2 class="page-title">
                                Search results
                            </h2>
                            <div class="text-secondary mt-1">About 2,410 result (0.19 seconds)</div>
                        </div> --}}
                    </div>

                    <form action="{{ backpack_url('market/filter') }}" method="get" autocomplete="off" novalidate=""
                        class="my-4">
                        @csrf
                        @method('GET')
                        <div class="row d-flex flex-column flex-md-row align-items-center">

                            <div class="col col-md-3 col-sm-12 mb-3 mb-md-0">
                                <label for="select-category" class="form-label">Product Category</label>
                                <select name="select-category" id="select-category" class="form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('select-category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col col-md-3 col-sm-12 mb-3 mb-md-0">
                                <label for="select-rating" class="form-label">Rating</label>
                                <select name="select-rating" id="select-rating" class="form-select">
                                    @foreach ($ratings as $rating)
                                        <option value="{{ $rating->id }}"
                                            {{ old('select-rating') == $rating->id ? 'selected' : '' }}>{{ $rating->name }}
                                            {{ $rating->rating }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col col-md-3 col-sm-12 mb-3 mb-md-0">
                                <label for="select-price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="select-price" name="select-price"
                                    placeholder="Enter price" value="{{ old('select-price') }}">
                            </div>

                            <div class="col col-md-3 col-sm-12  mt-3 text-start text-md-end">
                                <button type="submit" class="btn btn-outline-primary mt-4">Filter Search</button>
                            </div>

                        </div>
                    </form>

                    {{-- Products List Grid --}}
                    <div class="mx-auto px-5">

                        <div class="row mt-5 gy-4">
                            @foreach ($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="card" style="width: 17rem;">
                                        <img src="{{ asset('/storage/uploads/products/' . $product->image) }}"
                                            class="card-img-top" alt="{{ $product->name }}" width="220" height="220">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            @php
                                                $maxRating = \DB::table('feedback')
                                                    ->where('product_id', $product->id)
                                                    ->orderBy('rating_id', 'desc')
                                                    ->first();
                                            @endphp

                                            <p>{{$maxRating->rating}}</p>
                                            <div class="d-flex flex-row justify-content-between">
                                                <p class="card-text">₱{{ number_format($product->price, 2, '.', ',') }}</p>

                                                <small class="text-secodary">{{ $product->stock }} left</small>
                                            </div>
                                            <a href="{{ backpack_url('view_product/' . $product->id) }}"
                                                class="btn btn-primary text-wrap w-100">View</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
