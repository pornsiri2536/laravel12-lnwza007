@extends('layouts.app')

@section('content')
<h2 style="text-align:center; margin-bottom:20px;">📰 ข่าวท่องเที่ยวประเทศไทย 📰</h2>

<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px; margin-top:20px;">
    @foreach($news as $item)
        <div class="tourism-card">
            @if($item->image)
                <img src="{{ url("/images/news/$item->image") }}" alt="{{ $item->title }}" class="tourism-image">
            @else
                <img src="c:\Users\lenovo\Downloads\146223_0.jpg" class="tourism-image">
            @endif

            <h4>{{ $item->title }}</h4>
            <p>{{ Str::limit($item->content, 100) }}</p>

            <div style="text-align:center; margin-top:auto;">
                <a href="{{ route('news.show', $item->id) }}">
                    <button class="detail-btn">🔍 อ่านต่อ</button>
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection
