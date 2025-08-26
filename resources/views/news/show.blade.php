<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $newsItem->title }}</title>
</head>
<body>
    <h1>{{ $newsItem->title }}</h1>
    <p>{{ $newsItem->content }}</p>
    <small>Published: {{ $newsItem->created_at->format('d M Y') }}</small>
</body>
</html>
