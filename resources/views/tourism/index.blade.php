@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🌸 สถานที่ท่องเที่ยวประเทศไทย 🌸</h1>

    <div class="row">
        @foreach($places as $place)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    @if($place->image)
                        <img src="{{ url("/images/tourism/$place->image") }}" alt="{{ $place->name }}" class="tourism-image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $place->name }}</h5>
                        <p class="card-text text-truncate">{{ $place->description }}</p>
                        <a href="{{ route('tourism.show', $place->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
