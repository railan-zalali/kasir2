@include('layouts.header')
@include('layouts.navbar')
@include('layouts.sidebar')
<div class="content">
    <div class="container-fluid">
        @yield('container')
    </div>
</div>
@include('layouts.footer')
