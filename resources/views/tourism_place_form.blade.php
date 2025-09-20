@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($place) ? 'แก้ไขสถานที่ท่องเที่ยว' : 'เพิ่มสถานที่ท่องเที่ยว' }}</h2>
    <form action="{{ isset($place) ? route('tourism-place.update', $place->id) : route('tourism-place.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">ชื่อสถานที่</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $place->name ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">รายละเอียด</label>
            <textarea name="description" class="form-control" required>{{ old('description', $place->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">รูปภาพ</label>
            <input type="file" name="image" class="form-control">
            @if(isset($place) && $place->image)
                <img src="{{ asset('storage/' . $place->image) }}" width="100" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($place) ? 'บันทึกการแก้ไข' : 'เพิ่มข้อมูล' }}</button>
        <a href="{{ route('tourism-place.index') }}" class="btn btn-secondary">กลับ</a>
    </form>

    <div class="mt-4">
        <p>ขอบคุณข้อมูล : <span>credit</span>
            <a href="https://thailandtravel.app/content/read/3947" target="_blank" class="btn btn-info" style="margin-left:10px;">
                ไปยังเว็บไซต์ต้นทาง
            </a>
        </p>
        <a href="{{ route('tourism-place.index') }}" class="btn btn-secondary mt-2">กลับหน้ารายการสถานที่ท่องเที่ยว</a>
    </div>
</div>
@endsection
