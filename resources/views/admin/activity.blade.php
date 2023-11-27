@extends(backpack_view('blank'))

@section('content')
    <div class="page-wrapper ">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Activity Log
                        </h2>
                        <p class="text-muted">
                            Your recent activity on this website
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row justify-content-start">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body w-100">
                                <div class="divide-y">
                                    @foreach ($datas as $data)
                                        <div >
                                            <div class=" col w-100 d-flex  flex-row justify-content-between">
                                                <div class="text-truncate fs-3">
                                                    <strong>{{ $data->activity }}</strong>

                                                </div>
                                                <div class="fs-5 d-none d-lg-block">
                                                    <p>{{ $data->created_at }}</p>
                                                </div>
                                            </div>
                                            <div class="text-muted">
                                                {{ $data->created_at->diffForHumans() }}
                                            </div>
                                            {{-- <div class="row">
                                            </div> --}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
