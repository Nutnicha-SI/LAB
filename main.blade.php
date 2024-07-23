</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Week-02 : @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
<title>UI Element - @yield('title')</title>
</head>
<body>
    <header id="app-cmp-main-header">
    <h1>UI Element - @section('title-container')@yield('title')@show</h1>
        <a href="/example-01-form">Example 01 - Form</a> |
        <a href="/area-form">Area</a> |
        <a href="/payment-form">Payment</a> |
        <a href="/mul-form">Multiplication</a> |
</header>
    <div class="content">
    @yield('content')
</div>
    <br>
<footer>
    &copy; Saynut eiei Ltd.Created by Nutnicha Sittichai,Student ID: 652110101.
    </footer>
</body>
</html>
