@include('backend.layouts.header')
@include('backend.layouts.sidebar')
    <div class="container-fluid"> 
        @yield('content')
    </div><!-- container -->
@include('backend.layouts.footer')
    