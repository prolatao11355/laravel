<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        .header_nav {
            display: flex;
            list-style: none;
            padding-left: 0;
        }
        .header_nav li {
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <header>
        <ul class="header_nav">
            <li>サインアップ</li>
            <li>ログイン</li>
        </ul>
    </header>
    @yield('content')
</body>
</html>