<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>{{$title}}</h1>
    <p>{{$title_content}}</p>
    <h2>{{$title2}}</h2>
    <ul>
        @foreach ($title2_contents as $content)
            <li>{{$content}}</li>
        @endforeach
    </ul>
</body>
</html>