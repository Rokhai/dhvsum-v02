@extends(backpack_view('blank'))
@php
    // Define the hint path for the "backpack" view namespace
    // Illuminate\Support\Facades\View::addNamespace('backpack', base_path('vendor/backpack/base/src/resources/views'));
@endphp

@include('vendor.backpack.theme-tabler.inc.alerts')

@section('content')
    <div class="d-none">
        @if (Alert::has('success'))
            {{ Alert::first('success') }}
        @endif
    </div>
    {{-- Product Details --}}
    <div class="card container-sm">
        <div class="mt-4 mx-4">
            <div class="d-flex flex-row justify-content-between">
                {{-- <a href="{{url()->previous() }}" class="  link-primary  mr-5 fs-2"><i class="la la-long-arrow-alt-left"> Back </i></a> --}}
                <h2 class="mx-4">Product Details</h2>
                {{-- border border-primary rounded-cirle --}}
                <a href="{{ url()->previous() }}" class="btn-close " aria-label="Close"></a>
            </div>

        </div>
        <div class="img-container bg bg-ligt w-100 align-items-center d-flex justify-content-center">

            <img src="{{ asset('/storage/uploads/products/' . $product->image) }}" alt="" class="img-top  img-fluid"
                height="100">
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p class="card-text">Price: ${{ $product->price }}</p>
            <div class="d-flex flex-row justify-content-between">
                <p class="fs-3">{{ $product->stock }} sold </p>
                <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                    data-bs-target="#addToCartModal"><span class="fs-3"><i class="la la-cart-arrow-down"> </i> Add to
                        cart</span></button>
            </div>

        </div>
        {{-- Modal For Quantity Confirmation --}}
        <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-center" role="document">

                <div class="modal-content">
                    <form action="{{ backpack_url('view_product') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title">Add to cart</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                Product Name: {{ $product->name }}
                            </div>
                            <div>
                                Stock: {{ $product->stock }}
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <div class="input-group">
                                    <input type="number" id="quantity" name="quantity" class="form-control text-center"
                                        value="1" min="1">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="decrement()">-</button>
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="increment()">+</button>
                                </div>
                            </div>
                            <script>
                                function increment() {
                                    let quantity = document.getElementById('quantity');
                                    quantity.value = parseInt(quantity.value) + 1;
                                }

                                function decrement() {
                                    let quantity = document.getElementById('quantity');
                                    if (quantity.value > 1) {
                                        quantity.value = parseInt(quantity.value) - 1;
                                    }
                                }
                            </script>
                        </div>

                        <div class="modal-footer ">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"> Confirm </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- Product Desription --}}
    <div class="container-sm card my-2">
        <div class="card-header">
            <h3>Product Details</h3>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $product->description }}</p>
        </div>

    </div>


    {{-- Product Owner --}}
    @php
        $user = \DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->select('users.*')
            ->where('products.id', '=', $product->id)
            ->first();
    @endphp
    <div class=" col-12">
        <div class="card container-sm" style="height: 28rem">
            {{-- Student Profile --}}
            <div class="card-header justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <span class="avatar avatar-xl mb-3 rounded" {{-- style="background-image: url('http://www.venmond.com/demo/vendroid/img/avatar/big.jpg')"></span> --}}
                            src="{{ backpack_avatar_url($user) }}"
                            alt="{{ backpack_auth()->user()->name }}" onerror="this.style.display='none'"
                            style="z-index: 1;">
                    </div>
                    <div class="col-auto">
                        <div class="text-truncate">
                            <p class="fs-2 fw-bold">{{ optional($user)->name }}</p>
                            <p class=" text-muted">{{ optional($user)->email }}</p>
                            {{-- <div class="text-secondary">Active: yesterday</div> --}}
                        </div>

                        {{-- <div class="badge bg-primary"></div> --}}
                    </div>
                    <div class="row">

                        <a href="#" class="btn btn-primary fs-4">Chat</a>
                    </div>

                </div>
            </div>


            {{-- Product Feedback --}}
            @php
                $feedbacks = \DB::table('feedback')
                    ->join('users', 'feedback.user_id', '=', 'users.id')
                    ->select('feedback.*', 'users.name as user_name')
                    // ->select('feedback.*')
                    ->where('feedback.product_id', '=', $product->id)
                    ->get();
            @endphp

            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <h3 class="mt-3 mb-4">Feedbacks/Ratings</h3>
                <div class="divide-y">
                    @foreach ($feedbacks as $feedback)
                        <div>
                            <div class="row">
                                <div class="col-auto">
                                    {{-- <span class="avatar">JL</span> --}}

                                    <span class="avatar avatar-sm rounded-circle">
                                        <img class="avatar avatar-sm rounded-circle bg-transparent"
                                            src="{{ backpack_avatar_url(backpack_auth()->user()) }}"
                                            alt="{{ backpack_auth()->user()->name }}" onerror="this.style.display='none'"
                                            style="margin: 0;position: absolute;left: 0;z-index: 1;">
                                        <span
                                            class="avatar avatar-sm rounded-circle backpack-avatar-menu-container text-center">
                                            {{ backpack_user()->getAttribute('name') ? mb_substr(backpack_user()->name, 0, 1, 'UTF-8') : 'A' }}
                                        </span>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="text-truncate">
                                        <strong>{{ $feedback->user_name }}</strong> commented <strong>
                                            {{ $feedback->comment }} </strong>

                                    </div>
                                    <div class="text-secondary">
                                        {{ \Carbon\Carbon::parse($feedback->created_at)->diffForHumans() }}</div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div> {{ $feedback->rating }} </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- Comment Box --}}
{{-- <div class="card-footer">
                <div class="input-group input-group-flat">
                    <input type="text" class="form-control" autocomplete="off" placeholder="Type message">
                    <span class="input-group-text">
                        <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Clear search"
                            data-bs-original-title="Clear search">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mood-smile -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M9 10l.01 0"></path>
                                <path d="M15 10l.01 0"></path>
                                <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                            </svg>
                        </a>
                        <a href="#" class="link-secondary ms-2" data-bs-toggle="tooltip"
                            aria-label="Add notification" data-bs-original-title="Add notification">
                            <!-- Download SVG icon from http://tabler-icons.io/i/paperclip -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5">
                                </path>
                            </svg>
                        </a>
                    </span>
                </div> --}}
