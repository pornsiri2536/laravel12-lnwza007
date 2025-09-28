@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🌴 ข่าวการท่องเที่ยวประเทศไทย 🌴</h1>

    <div class="grid-container">
        @foreach($tourismNews as $news)
            <div class="card shadow h-100">
                @if($news->image)
                    <img src="{{ $news->image }}" alt="{{ $news->title }}" class="card-img-top">
                @else
                    <img src="https://picsum.photos/400/200?random={{ $news->id }}" alt="{{ $news->title }}" class="card-img-top">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($news->description, 150) }}</p>
                    
                    @if($news->eventDates->count() > 0)
                        <div class="mb-3">
                            <small class="text-muted">
                                📅 วันที่จัดงาน: 
                                @foreach($news->eventDates as $event)
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}
                                    @if($event->end_date != $event->start_date)
                                        - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                                    @endif
                                    @if(!$loop->last), @endif
                                @endforeach
                            </small>
                        </div>
                    @endif
                    
                    <div class="mt-auto">
                        <a href="{{ route('tourism-news.show', $news->id) }}" class="btn btn-primary btn-sm">
                            🔍 อ่านต่อ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4 text-center">
        <p>ขอบคุณข้อมูล : <span>credit</span>
            <a href="https://thailandtravel.app/content/read/3947" target="_blank" class="btn btn-info" style="margin-left:10px;">
                ไปยังเว็บไซต์ต้นทาง
            </a>
        </p>
    </div>
</div>

<style>
    .card-img-top {
        border-radius: 16px 16px 0 0;
        object-fit: cover;
        width: 100%;
        height: 220px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover .card-img-top {
        transform: scale(1.04);
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
    }
    .card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 12px rgba(80,80,160,0.08);
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 6px 24px rgba(80,80,160,0.15);
    }
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 24px;
        margin-top: 20px;
    }
    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 15px;
        }
        .card-img-top {
            height: 160px;
        }
    }
</style>
@endsection
