@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">🌸 ยินดีต้อนรับสู่เว็บไซต์ท่องเที่ยวประเทศไทย 🌸</h1>

    <!-- ข่าวล่าสุด -->
    <h2 class="mb-3">📰 ข่าวล่าสุด</h2>
    <div class="grid-container mb-4">
        @foreach($news as $item)
            <div class="card shadow h-100">
                <div class="card-body">
                    @if($item->image)
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="card-img-top">
                    @else
                        <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="{{ $item->title }}" class="card-img-top">
                    @endif
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->description, 80) }}</p>
                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary btn-sm">อ่านต่อ</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">ดูข่าวทั้งหมด</a>
    </div>

    <!-- ข่าวการท่องเที่ยว -->
    <h2 class="mb-3">🌴 ข่าวการท่องเที่ยวล่าสุด</h2>
    <div class="grid-container mb-4">
        @foreach($tourismNews as $item)
            <div class="card shadow h-100">
                <div class="card-body">
                    @if($item->image)
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="card-img-top">
                    @else
                        <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="{{ $item->title }}" class="card-img-top">
                    @endif
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($item->description, 80) }}</p>
                    
                    @if($item->eventDates->count() > 0)
                        <small class="text-muted d-block mb-2">
                            📅 {{ \Carbon\Carbon::parse($item->eventDates->first()->start_date)->format('d/m/Y') }}
                        </small>
                    @endif
                    
                    <a href="{{ route('tourism-news.show', $item->id) }}" class="btn btn-success btn-sm">อ่านต่อ</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('tourism-news.index') }}" class="btn btn-outline-secondary">ดูข่าวการท่องเที่ยวทั้งหมด</a>
    </div>

    <!-- สถานที่ท่องเที่ยว -->
    <h2 class="mb-3">🏞️ สถานที่ท่องเที่ยวแนะนำ</h2>
    <div class="grid-container mb-4">
        @foreach($places as $place)
            <div class="card shadow h-100">
                @if($place->image)
                    <img src="{{ $place->image }}" alt="{{ $place->name }}" class="card-img-top">
                @else
                    <img src="https://picsum.photos/300/200?random={{ $place->id }}" alt="{{ $place->name }}" class="card-img-top">
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
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            height: 100%;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
        }
    </style>
@endsection
