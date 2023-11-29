@extends(backpack_view('blank'))

@section('content')
    {{-- @extends(backpack_view('blank')) --}}

@section('content')
    <div class="page-wrapper">

        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="input-icon">
                        <input type="text" value="" class="form-control form-control-rounded" placeholder="Search…">
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
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row g-4">
                    <div class="col-3">
                        <form action="./" method="get" autocomplete="off" novalidate="">
                            <div class="subheader mb-2">Category</div>
                            <div class="list-group list-group-transparent mb-3">
                                <a class="list-group-item list-group-item-action d-flex align-items-center active"
                                    href="#">
                                    Games
                                    <small class="text-secondary ms-auto">24</small>
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                    Clothing
                                    <small class="text-secondary ms-auto">149</small>
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                    Jewelery
                                    <small class="text-secondary ms-auto">88</small>
                                </a>
                                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                    Toys
                                    <small class="text-secondary ms-auto">54</small>
                                </a>
                            </div>
                            <div class="subheader mb-2">Rating</div>
                            <div class="mb-3">
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" name="form-stars" value="5 stars"
                                        checked="">
                                    <span class="form-check-label">5 stars</span>
                                </label>
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" name="form-stars" value="4 stars">
                                    <span class="form-check-label">4 stars</span>
                                </label>
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" name="form-stars" value="3 stars">
                                    <span class="form-check-label">3 stars</span>
                                </label>
                                <label class="form-check">
                                    <input type="radio" class="form-check-input" name="form-stars"
                                        value="2 and less stars">
                                    <span class="form-check-label">2 and less stars</span>
                                </label>
                            </div>
                           
                            <div class="subheader mb-2">Price</div>
                            <div class="row g-2 align-items-center mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            ₱
                                        </span>
                                        <input type="text" class="form-control" placeholder="from" value="3"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-auto">—</div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            ₱
                                        </span>
                                        <input type="text" class="form-control" placeholder="to" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button class="btn btn-primary w-100">
                                    Confirm changes
                                </button>
                                <a href="#" class="btn btn-outline-primary w-100 mt-3">
                                    Reset to defaults
                                </a>
                            </div>
                        </form>
                    </div>
                    <div class="col-9">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-4">
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
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/brainstorming-session-with-creative-designers.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">JL</span>
                                            <div>
                                                <div>Jeffie Lewzey</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/finances-us-dollars-and-bitcoins-currency-money.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/002m.jpg)"></span>
                                            <div>
                                                <div>Mallory Hulme</div>
                                                <div class="text-secondary">yesterday</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/group-of-people-brainstorming-and-taking-notes-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/003m.jpg)"></span>
                                            <div>
                                                <div>Dunn Slane</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/blue-sofa-with-pillows-in-a-designer-living-room-interior.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/000f.jpg)"></span>
                                            <div>
                                                <div>Emmy Levet</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/people-watching-a-presentation-in-a-room.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/031f.jpg)"></span>
                                            <div>
                                                <div>Madeleine Salle</div>
                                                <div class="text-secondary">today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/home-office-laptop-organizer-and-cup-of-coffee.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/032f.jpg)"></span>
                                            <div>
                                                <div>Otha Denial</div>
                                                <div class="text-secondary">yesterday</div>
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

@endsection
