@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🌸 สถานที่ท่องเที่ยวประเทศไทย 🌸</h1>

    <div class="grid-container">
        @foreach($places as $place)
            <div class="card shadow h-100">
                @if($place->image)
                    <img src="{{ $place->image }}" alt="{{ $place->name }}" class="card-img-top">
                @else
                    <img src="https://picsum.photos/300/200?random={{ $place->id }}" alt="{{ $place->name }}" class="card-img-top">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $place->name }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($place->description, 100) }}</p>
                    <div class="text-center mt-auto">
                        <a href="{{ route('tourism.show', $place->id) }}" class="btn btn-primary">
                            🏞️ ดูรายละเอียด
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
