@extends(backpack_view('blank'))

@section('content')
    @extends(backpack_view('blank'))

@section('content')
    <div class="page-wrapper">
        <div class="input-icon">
            <input type="text" value="" class="form-control form-control-rounded" placeholder="Search…">
            <span class="input-icon-addon">
              <!-- Download SVG icon from http://tabler-icons.io/i/search -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path><path d="M21 21l-6 -6"></path></svg>
            </span>
          </div>
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Search results
                        </h2>
                        <div class="text-secondary mt-1">About 2,410 result (0.19 seconds)</div>
                    </div>
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
                            <div class="subheader mb-2">Tags</div>
                            <div class="mb-3">
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="business"
                                        checked="">
                                    <span class="form-check-label">business</span>
                                </label>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="evening">
                                    <span class="form-check-label">evening</span>
                                </label>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="leisure">
                                    <span class="form-check-label">leisure</span>
                                </label>
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="party">
                                    <span class="form-check-label">party</span>
                                </label>
                            </div>
                            <div class="subheader mb-2">Price</div>
                            <div class="row g-2 align-items-center mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            $
                                        </span>
                                        <input type="text" class="form-control" placeholder="from" value="3"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-auto">—</div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            $
                                        </span>
                                        <input type="text" class="form-control" placeholder="to" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="subheader mb-2">Shipping</div>
                            <div>
                                <select name="" class="form-select">
                                    <option>United Kingdom</option>
                                    <option>USA</option>
                                    <option>Germany</option>
                                    <option>Poland</option>
                                    <option>Other…</option>
                                </select>
                            </div>
                            <div class="mt-5">
                                <button class="btn btn-primary w-100">
                                    Confirm changes
                                </button>
                                <a href="#" class="btn btn-link w-100">
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
                                            src="./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/001f.jpg)"></span>
                                            <div>
                                                <div>Maryjo Lebarree</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-woman-working-in-a-cafe.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">EP</span>
                                            <div>
                                                <div>Egan Poetz</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/everything-you-need-to-work-from-your-bed.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/002f.jpg)"></span>
                                            <div>
                                                <div>Kellie Skingley</div>
                                                <div class="text-secondary">1 week and 2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-entrepreneur-working-from-a-modern-cafe.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/003f.jpg)"></span>
                                            <div>
                                                <div>Christabel Charlwood</div>
                                                <div class="text-secondary">today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">HS</span>
                                            <div>
                                                <div>Haskel Shelper</div>
                                                <div class="text-secondary">2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/group-of-people-sightseeing-in-the-city.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/006m.jpg)"></span>
                                            <div>
                                                <div>Lorry Mion</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/color-palette-guide-sample-colors-catalog-.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/004f.jpg)"></span>
                                            <div>
                                                <div>Leesa Beaty</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/stylish-workplace-with-computer-at-home.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/007m.jpg)"></span>
                                            <div>
                                                <div>Perren Keemar</div>
                                                <div class="text-secondary">4 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/pink-desk-in-the-home-office.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">SA</span>
                                            <div>
                                                <div>Sunny Airey</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-woman-sitting-on-the-sofa-and-working-on-her-laptop.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/009m.jpg)"></span>
                                            <div>
                                                <div>Geoffry Flaunders</div>
                                                <div class="text-secondary">1 week ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/coffee-on-a-table-with-other-items.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/010m.jpg)"></span>
                                            <div>
                                                <div>Thatcher Keel</div>
                                                <div class="text-secondary">1 week and 2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-entrepreneur-working-from-a-modern-cafe-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/005f.jpg)"></span>
                                            <div>
                                                <div>Dyann Escala</div>
                                                <div class="text-secondary">4 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/soft-photo-of-woman-on-the-bed-with-the-book-and-cup-of-coffee-in-hands.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/006f.jpg)"></span>
                                            <div>
                                                <div>Avivah Mugleston</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/fairy-lights-at-the-beach-in-bulgaria.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">AA</span>
                                            <div>
                                                <div>Arlie Armstead</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-working-on-laptop-at-home-office.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/008f.jpg)"></span>
                                            <div>
                                                <div>Tessie Curzon</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img src="./static/photos/modern-home-office.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/009f.jpg)"></span>
                                            <div>
                                                <div>Flossi Uttley</div>
                                                <div class="text-secondary">4 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/blond-using-her-laptop-at-her-bedroom.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/010f.jpg)"></span>
                                            <div>
                                                <div>Cesya Spritt</div>
                                                <div class="text-secondary">1 week ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/tropical-palm-leaves-floral-pattern-background.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/011m.jpg)"></span>
                                            <div>
                                                <div>Johnnie Gilby</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-read-book-and-drink-coffee.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/012m.jpg)"></span>
                                            <div>
                                                <div>Ban Rzehor</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img src="./static/photos/book-on-the-grass.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/011f.jpg)"></span>
                                            <div>
                                                <div>Carroll Erat</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/colorful-exotic-flowers-and-greenery.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/012f.jpg)"></span>
                                            <div>
                                                <div>Marsha Labat</div>
                                                <div class="text-secondary">today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/workplace-with-laptop-on-table-at-home.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/013m.jpg)"></span>
                                            <div>
                                                <div>Elston Muffett</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/city-lights-reflected-in-the-water-at-night.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/013f.jpg)"></span>
                                            <div>
                                                <div>Leigha Gorce</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/cryptocurrency-bitcoin-coins.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">TB</span>
                                            <div>
                                                <div>Tallie Bettis</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-read-book-and-drink-coffee-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/015f.jpg)"></span>
                                            <div>
                                                <div>Merrily Garforth</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/friends-at-a-restaurant-drinking-wine.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded">EB</span>
                                            <div>
                                                <div>Errol Blackley</div>
                                                <div class="text-secondary">2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/beautiful-blonde-woman-on-a-wooden-pier-by-the-lake.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/016f.jpg)"></span>
                                            <div>
                                                <div>Ninon Don</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/white-apple-imac-computer-with-elephant-mousepad.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/015m.jpg)"></span>
                                            <div>
                                                <div>Delaney Cairney</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/workplace-with-laptop-on-table-at-home-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/017f.jpg)"></span>
                                            <div>
                                                <div>Gratia Gooley</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/working-in-a-restaurant-macbook-cheese-cake-and-cup-of-coffee.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/018f.jpg)"></span>
                                            <div>
                                                <div>Odelinda McCosh</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-woman-sitting-on-the-sofa-and-working-on-her-laptop-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/016m.jpg)"></span>
                                            <div>
                                                <div>Wilburt Siegertsz</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/brainstorming-session-with-creative-designers-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/019f.jpg)"></span>
                                            <div>
                                                <div>Julietta Coke</div>
                                                <div class="text-secondary">1 week ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-drinking-hot-tea-in-her-home-office.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/017m.jpg)"></span>
                                            <div>
                                                <div>Portie Christou</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/stylish-workspace-with-macbook-pro.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/018m.jpg)"></span>
                                            <div>
                                                <div>Emmott Dowsett</div>
                                                <div class="text-secondary">yesterday</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/people-by-a-banquet-table-full-with-food.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/019m.jpg)"></span>
                                            <div>
                                                <div>Rooney Cassy</div>
                                                <div class="text-secondary">4 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-working-on-a-laptop-while-enjoying-a-breakfast-coffee-and-chocolate-in-bed.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/020m.jpg)"></span>
                                            <div>
                                                <div>Haze Hubbert</div>
                                                <div class="text-secondary">1 week and 2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/businesswoman-working-at-her-laptop.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/021m.jpg)"></span>
                                            <div>
                                                <div>Mata Codlin</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/finances-us-dollars-and-bitcoins-currency-money-5.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/022m.jpg)"></span>
                                            <div>
                                                <div>Parker Oaten</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/cup-of-coffee-on-table-in-cafe.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/023m.jpg)"></span>
                                            <div>
                                                <div>Johannes Paternoster</div>
                                                <div class="text-secondary">2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-woman-sitting-on-the-sofa-and-working-on-her-laptop-3.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/024m.jpg)"></span>
                                            <div>
                                                <div>Cary Baleine</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/man-looking-out-to-sea.jpg" class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/020f.jpg)"></span>
                                            <div>
                                                <div>Riane Milward</div>
                                                <div class="text-secondary">today</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/cup-of-coffee-on-table-in-cafe-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/025m.jpg)"></span>
                                            <div>
                                                <div>Reynold Indgs</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/workplace-with-laptop-on-table-at-home-3.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/026m.jpg)"></span>
                                            <div>
                                                <div>Parke Moneypenny</div>
                                                <div class="text-secondary">2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/businesswoman-working-at-her-laptop-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/021f.jpg)"></span>
                                            <div>
                                                <div>Sandi Keys</div>
                                                <div class="text-secondary">yesterday</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/cup-of-coffee-and-an-open-book.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/022f.jpg)"></span>
                                            <div>
                                                <div>Peria Errichiello</div>
                                                <div class="text-secondary">1 week and 2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/group-of-people-brainstorming-and-taking-notes-4.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/023f.jpg)"></span>
                                            <div>
                                                <div>Eva Acres</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/young-woman-sitting-on-the-sofa-and-working-on-her-laptop-4.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/027m.jpg)"></span>
                                            <div>
                                                <div>Jermaine Booley</div>
                                                <div class="text-secondary">3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/making-magic-with-fairy-lights.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/024f.jpg)"></span>
                                            <div>
                                                <div>Juanita Nobles</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-working-on-a-laptop-while-enjoying-a-breakfast-coffee-and-chocolate-in-bed-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/025f.jpg)"></span>
                                            <div>
                                                <div>Nanni Wooler</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/woman-drinking-tea-and-reading-book.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/026f.jpg)"></span>
                                            <div>
                                                <div>Mela Sydes</div>
                                                <div class="text-secondary">1 week and 2 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/a-woman-works-at-a-desk-with-a-laptop-and-a-cup-of-coffee.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/028m.jpg)"></span>
                                            <div>
                                                <div>Price Letixier</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/everything-you-need-to-work-from-your-bed-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/027f.jpg)"></span>
                                            <div>
                                                <div>Beatrix Ladewig</div>
                                                <div class="text-secondary">yesterday</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/workplace-with-laptop-on-table-at-home-4.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/029m.jpg)"></span>
                                            <div>
                                                <div>Donnie Biggin</div>
                                                <div class="text-secondary">5 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/stylish-workspace-with-macbook-pro-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/030m.jpg)"></span>
                                            <div>
                                                <div>Kerwinn Burkart</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/netflix-drug-lords-from-narcos.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/028f.jpg)"></span>
                                            <div>
                                                <div>Harriot McGeady</div>
                                                <div class="text-secondary">1 week and 1 day ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/stone-texture-high-resolution-background-2.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/029f.jpg)"></span>
                                            <div>
                                                <div>Desirae Prahm</div>
                                                <div class="text-secondary">1 week and 3 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/a-visit-to-the-bookstore.jpg" class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/030f.jpg)"></span>
                                            <div>
                                                <div>Netti Vondrasek</div>
                                                <div class="text-secondary">6 days ago</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card card-sm">
                                    <a href="#" class="d-block"><img
                                            src="./static/photos/books-and-purple-flowers-on-a-wooden-stool-by-the-bed.jpg"
                                            class="card-img-top"></a>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-3 rounded"
                                                style="background-image: url(./static/avatars/031m.jpg)"></span>
                                            <div>
                                                <div>Emlen Stairmand</div>
                                                <div class="text-secondary">today</div>
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
