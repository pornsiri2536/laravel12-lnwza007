@extends('layouts.app')

@section('content')
    <h1>✏️ แก้ไขข่าว</h1>

    <form action="{{ route('news.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>หัวข้อข่าว:</label><br>
        <input type="text" name="title" value="{{ $item->title }}" required><br><br>

        <label>รายละเอียด:</label><br>
        <textarea name="content" required>{{ $item->content }}</textarea><br><br>

        <button type="submit">บันทึกการแก้ไข</button>
    </form>

    <a href="{{ route('news.index') }}">⬅️ กลับ</a>
@endsection
