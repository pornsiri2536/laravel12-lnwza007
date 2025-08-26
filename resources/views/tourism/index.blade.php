<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการท่องเที่ยว</title>
</head>
<body>
    <h1>รายการสถานที่ท่องเที่ยว</h1>
    <ul>
        @foreach($tourisms as $item)
            <li>
                <a href="{{ route('tourism.show', $item->id) }}">
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
