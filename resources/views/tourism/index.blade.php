@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">สถานที่ท่องเที่ยว</h1>

    @if($places->count())
        <div class="row">
            @foreach($places as $place)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($place->image)
                            <img src="{{ asset('storage/' . $place->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $place->title }}">
                        @else
                            <img src="https://via.placeholder.com/400x250?text=No+Image" 
                                 class="card-img-top" 
                                 alt="No image">
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $place->title }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($place->description, 100) }}
                            </p>
                            <a href="{{ route('tourism.show', $place->id) }}" 
                               class="btn btn-primary mt-auto">
                                ดูรายละเอียด
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $places->links() }}
        </div>
    @else
        <div class="alert alert-info">ยังไม่มีข้อมูลสถานที่ท่องเที่ยว</div>
    @endif
</div>
@endsection
