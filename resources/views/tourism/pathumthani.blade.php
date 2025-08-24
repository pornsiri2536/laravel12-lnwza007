@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">🌸 สถานที่ท่องเที่ยวในประเทศไทย 🌸</h1>

    <div class="row">
        @foreach($places as $place)
            <div class="col-md-4 mb-4">
                <div class="card shadow h-100">
                    <img src="{{ $place['image'] }}" class="card-img-top" alt="{{ $place['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $place['name'] }}</h5>
                        <p class="card-text">{{ $place['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-4">
        <a href="https://thai.tourismthailand.org/Destinations/Provinces/ปทุมธานี/227" 
           target="_blank" class="btn btn-primary">
            ข้อมูลเพิ่มเติมจาก TAT
        </a>
    </div>
</div>
@endsection
