<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
    <header>
        <ul class="header_nav">
            <li>このサイトについて</li>
            <li>ユーザー設定</li>
            <li>プライバシーポリシー</li>
            <li>ログアウト</li>
        </ul>
    </header>
    <main>
        <h1>@yield('title')</h1>
        <p>@yield('content')</p>
    </main>
</body>
</html>