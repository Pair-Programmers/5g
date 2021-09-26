<!doctype html>
<html lang="en">
@include('website.partials.head')
<body>
    <div class="container">
        @include('website.partials.header')
        @yield('content')
        @include('website.partials.footer')
    </div>
    
    @include('website.partials.script')
    </body>
    </html>
