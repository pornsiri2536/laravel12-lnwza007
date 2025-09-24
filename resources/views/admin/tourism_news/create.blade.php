@extends('admin.layout')

@section('title','เพิ่มข่าวการท่องเที่ยว')
@section('page-title','เพิ่มข่าวการท่องเที่ยว (Create)')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.tourism_news.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">หัวข้อ</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รายละเอียด</label>
                        <textarea name="description" rows="8" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รูปภาพ (พาธหรือ URL)</label>
                        <input type="text" name="image" value="{{ old('image') }}" class="form-control @error('image') is-invalid @enderror" placeholder="/assets/img/news/01.jpg หรือ https://...">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ลิงก์แหล่งที่มา (ถ้ามี)</label>
                        <input type="url" name="link" value="{{ old('link') }}" class="form-control @error('link') is-invalid @enderror" placeholder="https://...">
                        @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary"><i class="fas fa-save me-1"></i> บันทึก</button>
                        <a href="{{ route('admin.tourism_news.index') }}" class="btn btn-outline-secondary">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
