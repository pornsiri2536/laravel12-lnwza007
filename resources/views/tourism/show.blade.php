@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow">
        @if($place->image)
            <img src="{{ $place->image }}" class="card-img-top" alt="{{ $place->name }}" style="height:350px; object-fit:cover;">
        @else
            <img src="https://picsum.photos/800/400?random={{ $place->id }}" class="card-img-top" alt="{{ $place->name }}" style="height:350px; object-fit:cover;">
        @endif
        <div class="card-body">
            <h2>{{ $place->name }}</h2>
            <p>{{ $place->description }}</p>
            <a href="{{ route('tourism.index') }}" class="btn btn-secondary">⬅ กลับไปหน้ารวม</a>
        </div>
    </div>
</div>
@endsection
