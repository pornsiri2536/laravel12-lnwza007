<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>{{ $newsItem->title }}</title>
    <style>
        body { font-family: Tahoma, sans-serif; margin: 20px; }
        img { width: 400px; border-radius: 10px; margin-bottom: 20px; }
        a { display: inline-block; margin-top: 20px; color: blue; font-weight: bold; text-decoration: none; }
    </style>
</head>
<body>
    <h1>{{ $newsItem->title }}</h1>
    <img src="{{ asset('images/'.$newsItem->image) }}" alt="{{ $newsItem->title }}">
    <p>{{ $newsItem->content }}</p>
    <a href="{{ route('tourism.index') }}">⬅ กลับไปหน้าหลัก</a>
</body>
</html><!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>{{ $tourism->title }}</title>
</head>
<body>
    <h1>{{ $tourism->title }}</h1>
    <p>{{ $tourism->description }}</p>
    <a href="{{ route('tourism.index') }}">ย้อนกลับ</a>
</body>
</html>

