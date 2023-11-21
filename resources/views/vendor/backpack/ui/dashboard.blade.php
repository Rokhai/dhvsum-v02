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

    <section class="col" id="col">
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
                    <a href="#" class="swiper-slide"><img src="img/logo.png" alt=""></a>
                    <a href="#" class="swiper-slide"><img src="img/logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </section>
@endsection
