@extends('layouts.app')

@section('content')
<h2 style="text-align:center; margin-bottom:20px;">📰 ข่าวท่องเที่ยวประเทศไทย 📰</h2>

<div class="grid-container">
    @foreach($news as $item)
        <div class="card shadow h-100">
            @if($item->image)
                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="card-img-top">
            @else
                <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="{{ $item->title }}" class="card-img-top">
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text flex-grow-1">{{ Str::limit($item->description, 100) }}</p>
                <div class="text-center mt-auto">
                    <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary">
                        🔍 อ่านต่อ
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    @media (max-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }
    }
</style>
@endsection
