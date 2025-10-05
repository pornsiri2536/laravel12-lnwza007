@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $place->name }}</h1>
    <p>{{ $place->description }}</p>

    @if($place->image)
        <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" style="max-width:400px;">
    @endif

    <p><strong>ที่ตั้ง:</strong> {{ $place->location }}</p>
</div>
@endsection
