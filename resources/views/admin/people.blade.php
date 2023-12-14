@extends(backpack_view('blank'))

@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            People
                        </h2>
                        {{-- <div class="text-secondary mt-1">1-18 of 413 people</div> --}}
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <form action="{{backpack_url('people/search')}}" method="GET">
                                @csrf
                                @method('GET')
                                <input type="search" name="search" class="form-control d-inline-block w-9 me-3"
                                    placeholder="Search user…" value="{{ old('search') }}">
                                <button type="submit" class="d-none"></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    @foreach ($users as $user)
                        @if ($user->is_admin == 1)
                            <div class="col-md-6 col-lg-3">
                                <div class="card" style="height: 19rem;">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 rounded"><img
                                                src="{{ asset(optional($user)->avatar) }}" alt=""></span>
                                        <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
                                        <p class="badge rounded-pill text-bg-primary">Admin</p>
                                    </div>
                                    <div class="d-flex">
                                        <a href="{{ backpack_url('chat/' . $user->id) }}}}"
                                            class="card-btn btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                                </path>
                                                <path d="M3 7l9 6l9 -6"></path>
                                            </svg>
                                            Chat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-md-6 col-lg-3">
                                <div class="card" style="height: 19rem;">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 rounded"><img
                                                src="{{ asset(optional($user)->avatar) }}" alt=""></span>
                                        <h3 class="m-0 mb-1"><a href="#">{{ $user->name }}</a></h3>
                                    </div>
                                    <div class="d-flex">
                                        <a href="{{ backpack_url('chat/' . $user->id) }}}}"
                                            class="card-btn btn"><!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path
                                                    d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                                </path>
                                                <path d="M3 7l9 6l9 -6"></path>
                                            </svg>
                                            Chat
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
