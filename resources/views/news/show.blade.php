@extends('layouts.app')

@section('content')
<div style="max-width:800px; margin:0 auto; padding:20px;">
    {{-- ชื่อข่าว --}}
    <h2 style="text-align:center; margin-bottom:20px;">{{ $item->title }}</h2>

    {{-- รูปใหญ่ --}}
    <div style="text-align:center; margin-bottom:20px;">
        @if($item->image)
            <img src="{{ $item->image }}" alt="{{ $item->title }}" style="width:100%; max-height:500px; object-fit:cover; border-radius:12px;">
        @else
            <img src="https://picsum.photos/800/400?random={{ $item->id }}" alt="{{ $item->title }}" style="width:100%; max-height:500px; object-fit:cover; border-radius:12px;">
        @endif
    </div>

    {{-- เนื้อหา --}}
    <div style="font-size:16px; color:#333; margin-bottom:20px;">
        <p>{{ $item->description }}</p>
    </div>

    {{-- ปุ่มย้อนกลับ --}}
    <div style="text-align:center; margin-top:20px;">
        <a href="{{ route('news.index') }}">
            <button style="padding:10px 20px; background:#ffc107; color:black; border:none; border-radius:8px;">
                🔙 กลับหน้ารายการข่าว
            </button>
        </a>
    </div>
</div>
@endsection

