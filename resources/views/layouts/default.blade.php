<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .header_nav{
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        .header_nav li{
            margin-right: 30px;
        }
    </style>
</head>
<body>
    @yield('header')
    @yield('content')
</body>
</html>