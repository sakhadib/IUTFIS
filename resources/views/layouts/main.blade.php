@if(session('executive_id') != null)
    @include('layouts.log_header')
@else
    @include('layouts.header')
@endif
{{-- @include('layouts.header') --}}
@yield('main')
@include('layouts.footer')