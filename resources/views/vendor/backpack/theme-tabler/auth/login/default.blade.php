@extends(backpack_view('layouts.auth'))

@section('content')
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4 display-6 auth-logo-container">
                {{-- {!! backpack_theme_config('project_logo') !!} --}}
                <img src='/images/logo/logo.png' width=90 height=90 class='rounded-circle bg-white' />

            </div>
            <div class="card card-md">
                <div class="card-body pt-0">
                    @include(backpack_view('auth.login.inc.form'))
                </div>
            </div>
            @if (config('backpack.base.registration_open'))
                <div class="text-center text-muted mt-4">
                    <a tabindex="6" href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection