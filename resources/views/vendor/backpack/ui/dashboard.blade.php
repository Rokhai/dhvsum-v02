@extends(backpack_view('blank'))

@section('content')
    <div class=" w-100 h-100 my-auto mt-5 ">
        <div class="d-flex flex-sm-columns align-items-center container mx-auto">
            <div class="">
                <h1 class="display-1 fw-bolder">DHVSUM</h1>
                <h2 class="display-2">Don Honorio Ventura State University Marketplace</h2>
                <p class="lead fs-2 lh-5">
                    This web system marketplace is only available within the premise of Don Honorio Ventura State
                    University, where the Users are able to post their items or products such as their used P.E. Uniforms,
                    College Uniforms, University Logo Patches, and this will not only limited products, but also services
                    are included. This will be a localize platform for student to build communal economy if its for funds of
                    student organizations among colleges. This will be potentially beneficial in College of Business Studies
                    to market their products if its for thesis or projects.
                </p>

                <a href="{{ backpack_url('my-store') }}" class="btn btn-primary btn-large mt-3 p-3 fs-2">
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
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-simple">
                        About Us
                    </a>

                </div>
            </div>
        </div>
    </div>



    {{-- Modal For About US --}}
    <div class="modal modal-blur fade" id="modal-simple" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">About US</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This is Web Marketplace to cater a platform for students to sell their products and services within the
                    premise of Don Honorio Ventura State University.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
