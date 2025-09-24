@extends('admin.layout')

@section('title','แก้ไขผู้ใช้งาน')
@section('page-title','แก้ไขผู้ใช้งาน (Edit)')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.user_mgmt.update', ['user_mgmt' => $user->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">ชื่อผู้ใช้</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">อีเมล</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">รหัสผ่าน (ไม่กรอกหากไม่ต้องการเปลี่ยน)</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="เว้นว่างเพื่อไม่เปลี่ยนรหัสผ่าน">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $user->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">เปิดใช้งานผู้ใช้งานนี้</label>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn btn-primary"><i class="fas fa-save me-1"></i> บันทึก</button>
                        <a href="{{ route('admin.user_mgmt.index') }}" class="btn btn-outline-secondary">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
