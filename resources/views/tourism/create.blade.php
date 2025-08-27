@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">➕ เพิ่มแหล่งท่องเที่ยวใหม่</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tourism.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อแหล่งท่องเที่ยว</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">คำอธิบาย</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">ที่ตั้ง</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">รูปภาพ</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">บันทึก</button>
        <a href="{{ route('tourism.index') }}" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>
<div class="mb-3">
    <label for="image" class="form-label">ลิงก์รูปภาพ</label>
    <input type="url" name="image" class="form-control" value="{{ old('image') }}">
    <small class="text-muted">ใส่ URL ของรูปภาพ เช่น https://example.com/image.jpg</small>
</div>
@endsection
