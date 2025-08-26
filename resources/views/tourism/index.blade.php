<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สถานที่ท่องเที่ยว จังหวัดปทุมธานี</title>
    <style>
        body { font-family: Tahoma, sans-serif; margin: 20px; }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
        }
        img { width: 100%; border-radius: 10px; }
        h3 { margin: 10px 0; }
        a { text-decoration: none; color: blue; font-weight: bold; }
    </style>
</head>
<body>
    <h1>🌸 สถานที่ท่องเที่ยว จังหวัดปทุมธานี 🌸</h1>

    @foreach($news as $item)
        <div class="card">
            <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->title }}">
            <h3>{{ $item->title }}</h3>
            <p>{{ Str::limit($item->content, 50) }}</p>
            <a href="{{ route('tourism.show', $item->id) }}">อ่านเพิ่มเติม</a>
        </div>
    @endforeach
</body>
</html>
