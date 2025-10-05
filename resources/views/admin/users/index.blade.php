@extends('layouts.app')

@section('content')
<div class="container">
    <h1>สถานที่ท่องเที่ยว</h1>
    <ul>
        @foreach($places as $place)
            <li>
                <a href="{{ route('tourism.show', $place->id) }}">
                    {{ $place->name }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $places->links() }} <!-- pagination -->
</div>
@endsection
