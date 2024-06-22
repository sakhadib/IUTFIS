{{-- @if(session('is_logged_in'))
    @include('layouts.log_header')
@else
    @include('layouts.header')
@endif --}}
@include('layouts.header')
@yield('main')
@include('layouts.footer')