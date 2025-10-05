@extends('layouts.app')

@section('content')
<div class="container">
    <h2>แก้ไขผู้ใช้งาน</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>อีเมล</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>เปลี่ยนรหัสผ่าน (ถ้าไม่กรอกจะไม่เปลี่ยน)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">อัปเดต</button>
    </form>
</div>
@endsection
