@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow">
        @if($news->image)
            <img src="{{ $news->image }}" class="card-img-top" alt="{{ $news->title }}" style="height:400px; object-fit:cover;">
        @else
            <img src="https://picsum.photos/800/400?random={{ $news->id }}" class="card-img-top" alt="{{ $news->title }}" style="height:400px; object-fit:cover;">
        @endif
        
        <div class="card-body">
            <h1 class="card-title text-center mb-4">{{ $news->title }}</h1>
            
            <div class="row mb-4">
                <div class="col-md-8">
                    <p class="card-text" style="font-size: 18px; line-height: 1.6;">{{ $news->description }}</p>
                </div>
                
                <div class="col-md-4">
                    @if($news->eventDates->count() > 0)
                        <div class="card bg-light">
                            <div class="card-header">
                                <h5>📅 ข้อมูลการจัดงาน</h5>
                            </div>
                            <div class="card-body">
                                @foreach($news->eventDates as $event)
                                    <div class="mb-3">
                                        <strong>{{ $event->event_name }}</strong><br>
                                        <small class="text-muted">
                                            วันที่: {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y') }}
                                            @if($event->end_date != $event->start_date)
                                                - {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y') }}
                                            @endif
                                        </small>
                                        @if($event->location)
                                            <br><small class="text-muted">📍 {{ $event->location }}</small>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            @if($news->link)
                <div class="text-center mb-4">
                    <a href="{{ $news->link }}" target="_blank" class="btn btn-info btn-lg">
                        🔗 อ่านเพิ่มเติม
                    </a>
                </div>
            @endif
            
            <div class="text-center">
                <a href="{{ route('tourism-news.index') }}" class="btn btn-secondary">
                    🔙 กลับไปหน้ารายการข่าวการท่องเที่ยว
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
