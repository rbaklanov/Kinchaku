<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
@include('partials.header')
<div>
    <main>
        <div class="container-fluid">
            <div class="fade-in">
                @yield('content')
            </div>
        </div>
    </main>
</div>
@include('partials.footer')
@include('partials.scripts')
</body>
</html>
