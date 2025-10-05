@extends('layouts.app')

@section('content')
<div class="container">
    <h2>เพิ่มผู้ใช้งาน</h2>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>ชื่อ</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>อีเมล</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>รหัสผ่าน</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">บันทึก</button>
    </form>
</div>
@endsection
