@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">🌸 ยินดีต้อนรับสู่เว็บไซต์ท่องเที่ยวประเทศไทย 🌸</h1>

    <!-- ข่าวล่าสุด -->
    <h2 class="mb-3">📰 ข่าวล่าสุด</h2>
    <div class="grid-container mb-4">
        @foreach($news as $item)
            <div class="card shadow h-100">
                <div class="card-body">
                    <img src="{{ url("/images/news/$item->image") }}" alt="{{ $item->title }}" class="card-img-top">
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->content, 80) }}</p>
                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary btn-sm">อ่านต่อ</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">ดูข่าวทั้งหมด</a>
    </div>

    <!-- สถานที่ท่องเที่ยว -->
    <h2 class="mb-3">🏞️ สถานที่ท่องเที่ยวแนะนำ</h2>
    <div class="grid-container mb-4">
        @foreach($places as $place)
            <div class="card shadow h-100">
                @if($place->image)
                    <img src="{{ url("/images/tourism/$place->image") }}" alt="{{ $place->name }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $place->name }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($place->description, 80) }}</p>
                    <a href="{{ route('tourism.show', $place->id) }}" class="btn btn-success btn-sm">ดูรายละเอียด</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('tourism.index') }}" class="btn btn-outline-secondary">ดูสถานที่ทั้งหมด</a>
    </div>

    <!-- เพิ่ม CSS -->
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(5, 1fr); /* 5 คอลัมน์ */
            gap: 20px;
        }
        .card {
            height: 100%;
        }
        .card img {
            height: 150px;
            object-fit: cover;
        }
    </style>
@endsection
