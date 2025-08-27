@extends('layouts.app')

@section('content')
    <h1>➕ เพิ่มข่าวใหม่</h1>

    <form action="{{ route('news.store') }}" method="POST">
        @csrf
        <label>หัวข้อข่าว:</label><br>
        <input type="text" name="title" required><br><br>

        <label>รายละเอียด:</label><br>
        <textarea name="content" required></textarea><br><br>

        <button type="submit">บันทึก</button>
    </form>

    <a href="{{ route('news.index') }}">⬅️ กลับ</a>
@endsection

