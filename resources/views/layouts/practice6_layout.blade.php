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
        <dl>
            <dt>名前</dt>
            <dd>@yield('name')</dd>
            <dt>住所</dt>
            <dd>@yield('address')</dd>
            <dt>特技</dt>
            <dd>@yield('like')</dd>
        </dl>
    </main>
</body>
</html>