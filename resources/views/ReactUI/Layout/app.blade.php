<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    @include('layouts.nav')
    <div id="nav"></div>
    @yield('content')
    @viteReactRefresh
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</body>

</html>
