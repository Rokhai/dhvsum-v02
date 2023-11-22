@extends(backpack_view('blank'))

@php
    // if (backpack_theme_config('show_getting_started')) {
    //     $widgets['before_content'][] = [
    //         'type' => 'view',
    //         'view' => backpack_view('inc.getting_started'),
    //     ];
    // } else {
    //     $widgets['before_content'][] = [
    //         'type' => 'jumbotron',
    //         'heading' => trans('backpack::base.welcome'),
    //         'content' => trans('backpack::base.use_sidebar'),
    //         'button_link' => backpack_url('logout'),
    //         'button_text' => trans('backpack::base.logout'),
    //     ];
    // }
@endphp

@section('content')
    {{-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" /> --}}
    {{-- <link rel="stylesheet" href="css/style.css"> --}}

    {{-- <section class="col" id="col">
        <div class="row">
            <div class="col-1">
                <h1>DHVSUM </h1>
                <h2>Don Honorio Ventura State University Marketplace</h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h4>
                <button type="button" class="btn">Shop Now</button>
            </div>
            
            <div class="swiper col-2">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide"><img src='/images/logo/logo.png' width=90 height=90 class='rounded-circle bg-white' /></a>
                    <a href="#" class="swiper-slide"><img src='/images/logo/logo.png' width=90 height=90 class='rounded-circle bg-white' /></a>
                    <a href="#" class="swiper-slide"><img src='/images/logo/logo.png' width=90 height=90 class='rounded-circle bg-white' /></a>
                </div>
            </div>
        </div>
    </section> --}}

    <div class="container-sm w-100 h-100 my-auto mt-5">
        <div class="row align-items-center">
            <div class="col-6 text-wrap ">
                <h1 class="display-1 fw-bolder">DHVSUM</h1>
                <h2 class="display-2">Don Honorio Ventura State University Marketplace</h2>
                <h4 class="lead fs-2 lh-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                    incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</h4>

                <a href="{{ backpack_url('my-store') }}" class="btn btn-primary btn-large mt-3 p-3 fs-2">
                    {{-- <span class="fs-3"><i class="las la-shopping-cart fs-1"></i> Shop Now </span> --}}
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
                {{-- <button type="button" class="btn btn-primary btn-large mt-3 p-3"><span class="fs-3"><i class="las la-shopping-cart fs-1"></i> Shop Now </span></button> --}}
            </div>
            <div class="col-6 ">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="#" class="swiper-slide"><img src='/images/logo/logo.png'
                                    class='rounded-circle bg-white w-auto h-auto' /></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#" class="swiper-slide"><img src='/images/logo/logo.png'
                                    class='rounded-circle bg-white w-auto h-auto' /></a>
                        </div>
                        <div class="carousel-item">
                            <a href="#" class="swiper-slide"><img src='/images/logo/logo.png'
                                    class='rounded-circle bg-white w-auto h-auto' /></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
@endsection
