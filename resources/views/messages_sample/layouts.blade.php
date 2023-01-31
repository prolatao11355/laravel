<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <style>
        .nav{
            display: flex;
            list-style: none;
        }
        .nav li{
            margin-right: 30px;
        }
    </style>
</head>
<body>
    <header>
        <ul class="nav">
            <li>このサイトについて</li>
            <li>ユーザー設定</li>
            <li>プライバシーポリシー</li>
            <li>ログアウト</li>
        </ul>
    </header>
    <main>
        <h1>@yield('title')</h1>
        @yield('content')
    </main>
</body>
</html>