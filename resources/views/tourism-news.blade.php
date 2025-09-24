@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🌴 ข่าวการท่องเที่ยวประเทศไทย 🌴</h1>

    <div class="grid-container">
        @forelse($tourismNews as $news)
            <div class="card shadow h-100">
                @php
                    $imgSrc = null;
                    if (!empty($news->image)) {
                        if (\Illuminate\Support\Str::startsWith($news->image, ['http', '/'])) {
                            $imgSrc = $news->image;
                        } else {
                            $candidateNews = '/assets/img/news/' . ltrim($news->image, '/');
                            $candidateTour = '/assets/img/tourism/' . ltrim($news->image, '/');
                            $imgSrc = file_exists(public_path(ltrim($candidateNews, '/'))) ? $candidateNews : $candidateTour;
                        }
                    }
                @endphp
                @if($imgSrc)
                    <img src="{{ $imgSrc }}" alt="{{ $news->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                @else
                    <img src="https://picsum.photos/400/200?random={{ $news->id }}" alt="{{ $news->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($news->description, 150) }}</p>

                    

                    @if($news->eventDates->count() > 0)
                        <div class="mb-2">
                            <small class="text-muted">
                                📅 วันที่จัดงาน: 
                                @php($first = $news->eventDates->first())
                                {{ \Carbon\Carbon::parse($first->start_date)->format('d/m/Y') }}
                                @if($first->end_date && $first->end_date !== $first->start_date)
                                    - {{ \Carbon\Carbon::parse($first->end_date)->format('d/m/Y') }}
                                @endif
                            </small>
                        </div>
                    @endif

                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ $news->link ?: route('tourism-news.show', $news->id) }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-external-link-alt me-1"></i> อ่านต่อ
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-5">
                <i class="fas fa-info-circle fa-2x mb-3"></i>
                <p>ยังไม่มีข่าวการท่องเที่ยว</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $tourismNews->links() }}
    </div>
</div>

<style>
    /* Layout */
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 28px;
        margin-top: 24px;
    }

    /* Card */
    .card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 24px rgba(0,0,0,0.08);
        transition: transform .25s ease, box-shadow .25s ease;
        background: #fff;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 36px rgba(0,0,0,0.12);
    }

    /* Images */
    .card-img-top {
        border-bottom: 1px solid #f1f3f5;
        background: #f8f9fa;
    }

    /* Content */
    .card-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: .5rem;
    }
    .card-text {
        color: #6c757d;
    }

    /* Date badge */
    .date-badge {
        display: inline-block;
        background: #eef2ff;
        color: #4f46e5;
        font-weight: 600;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: .8rem;
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(45deg, #3b82f6, #6366f1);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        padding: 10px 16px;
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(59,130,246,.35);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 18px;
        }
    }
</style>
@endsection
