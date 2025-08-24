<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ท่องเที่ยวปทุมธานี</title>
    <style>
        body { font-family: Tahoma, sans-serif; margin: 20px; }
        .section { margin-bottom: 40px; }
        .place, .news { margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 8px; }
        img { max-width: 200px; display: block; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>แหล่งท่องเที่ยวจังหวัดปทุมธานี</h1>

    <div class="section">
        <h2>🏞️ สถานที่ท่องเที่ยว</h2>
        @forelse($places as $place)
            <div class="place">
                <h3>{{ $place->name }}</h3>
                <p>{{ $place->description }}</p>
                @if($place->image)
                    <img src="{{ asset('storage/'.$place->image) }}" alt="{{ $place->name }}">
                @endif
            </div>
        @empty
            <p>ยังไม่มีข้อมูลสถานที่ท่องเที่ยว</p>
        @endforelse
    </div>

    <div class="section">
        <h2>📰 ข่าวท่องเที่ยว</h2>
        @forelse($news as $item)
            <div class="news">
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->content }}</p>
                <small>เผยแพร่: {{ \Carbon\Carbon::parse($item->published_at)->format('d/m/Y') }}</small>
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}">
                @endif
            </div>
        @empty
            <p>ยังไม่มีข่าวท่องเที่ยว</p>
        @endforelse
    </div>

</body>
</html>
