@extends(backpack_view('blank'))

@section('content')
{{-- <div class="jumbotron">
    <h1 class="mb-4">Activity</h1>

    <p>Go to <code>{{ $page }}</code> to edit this view or <code>{{ $controller }}</code> to edit the controller.</p>
</div> --}}

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <h2 class="page-title">
              Your Activity
            </h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <div class="divide-y">
                  
                  <div>
                    <div class="row">
                      {{-- <div class="col-auto">
                        <span class="avatar" style="background-image: url(./static/avatars/006f.jpg)"></span>
                      </div> --}}
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Logged In</strong>
                        </div>
                        {{-- <div class="text-secondary">2 days ago</div> --}}
                        <div class="text-secondary">11-27-2002 11:11:00</div>
                      </div>
                    </div>
                  </div>
                  <div>
                    <div class="row">
                      <div class="col-auto">
                        <span class="avatar">AA</span>
                      </div>
                      <div class="col">
                        <div class="text-truncate">
                          <strong>Arlie Armstead</strong> sent a Review Request to <strong>Amanda Blake</strong>.
                        </div>
                        <div class="text-secondary">2 days ago</div>
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
