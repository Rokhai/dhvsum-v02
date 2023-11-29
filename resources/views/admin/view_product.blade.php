@extends(backpack_view('blank'))

@section('content')
    <div class="card">
        <div class="img-container bg bg-ligt h-25 w-100 align-items-center d-flex justify-content-center">

            <img src="{{ asset('/storage/uploads/products/' . $product->image) }}" alt="" class="img-top  img-fluid">
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Price: ${{ $product->price }}</p>
        </div>

    </div>

    
    <div class="col-12">
        <div class="card" style="height: 28rem">
            {{-- Student Profile --}}
            <div class="card-header justify-content-center">
                <div class="row">
                    <div class="col-auto">
                        <span class="avatar avatar-xl mb-3 rounded"
                            style="background-image: url('http://www.venmond.com/demo/vendroid/img/avatar/big.jpg')"></span>
                    </div>
                    <div class="col-auto">
                        <div class="text-truncate">
                            <p class="fs-2 fw-bold">Rosgen Hizer</p>    
                            <p class=" text-muted">test@example.com</p>
                            <div class="text-secondary">Active: yesterday <div class="badge bg-primary"></div></div>
                        </div>
                         
                        {{-- <div class="badge bg-primary"></div> --}}
                    </div>
                    <a href="#" class="btn btn-primary fs-4">Chat</a>
                    
                </div>
            </div>
            {{-- Product Feedback --}}
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                <div class="divide-y">
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar">JL</span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    <strong>Jeffie Lewzey</strong> commented on your <strong>"I'm not a witch."</strong>
                                    post.
                                </div>
                                <div class="text-secondary">yesterday</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-auto">
                                <span class="avatar" style="background-image: url(./static/avatars/002m.jpg)"></span>
                            </div>
                            <div class="col">
                                <div class="text-truncate">
                                    It's <strong>Mallory Hulme</strong>'s birthday. Wish him well!
                                </div>
                                <div class="text-secondary">2 days ago</div>
                            </div>
                            <div class="col-auto align-self-center">
                                <div class="badge bg-primary"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Comment Box --}}
            <div class="card-footer">
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
                </div>
            </div>
        </div>

    </div>
@endsection
