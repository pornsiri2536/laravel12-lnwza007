@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow">
        @if($place->image)
            <img src="{{ url("/images/tourism/$place->image") }}" class="card-img-top" alt="{{ $place->name }}" style="height:350px; object-fit:cover;">
        @endif
        <div class="card-body">
            <h2>{{ $place->name }}</h2>
            <p><strong>ที่ตั้ง:</strong> {{ $place->location }}</p>
            <p>{{ $place->description }}</p>
            <a href="{{ route('tourism.index') }}" class="btn btn-secondary">⬅ กลับไปหน้ารวม</a>
        </div>
    </div>
</div>
@endsection
