@extends('admin.layout')

@section('title','แก้ไขข่าว')
@section('page-title','แก้ไขข่าว (Edit)')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.news.update', $item->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">หัวข้อข่าว</label>
                        <input type="text" name="title" value="{{ old('title', $item->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รายละเอียด</label>
                        <textarea name="description" rows="8" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $item->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รูปภาพ (พาธหรือ URL)</label>
                        <input type="text" name="image" value="{{ old('image', $item->image) }}" class="form-control @error('image') is-invalid @enderror" placeholder="เช่น /assets/img/news/01.jpg หรือ https://...">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">อัปโหลดรูปภาพ</label>
                        <input type="file" name="image_file" class="form-control @error('image_file') is-invalid @enderror" accept="image/*" onchange="previewSelected(event)">
                        @error('image_file')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="text-muted">หากอัปโหลดไฟล์ ระบบจะใช้ไฟล์นี้แทนค่าช่อง URL/พาธ</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">ตัวอย่างรูป</label>
                        <img id="previewImg" src="{{ $item->image }}" alt="preview" style="max-width: 320px; border: 1px solid #eee; border-radius: 8px;">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ลิงก์แหล่งที่มา (ถ้ามี)</label>
                        <input type="url" name="link" value="{{ old('link', $item->link) }}" class="form-control @error('link') is-invalid @enderror" placeholder="https://...">
                        @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary"><i class="fas fa-save me-1"></i> บันทึก</button>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function previewSelected(e){
  const [file] = e.target.files || [];
  if(!file) return;
  const url = URL.createObjectURL(file);
  const img = document.getElementById('previewImg');
  if(img) img.src = url;
}
</script>
@endsection
