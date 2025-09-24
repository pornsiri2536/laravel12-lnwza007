@extends('admin.layout')

@section('title', 'จัดการผู้ใช้งาน')
@section('page-title', 'จัดการผู้ใช้งาน')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>รายการผู้ใช้งาน</h4>
    <a href="{{ route('admin.user_mgmt.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>
        เพิ่มผู้ใช้งาน
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($users->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ชื่อ</th>
                            <th>อีเมล</th>
                            <th>Role</th>
                            <th>สถานะ</th>
                            <th>วันที่สร้าง</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->role)
                                        <span class="badge bg-info">{{ $user->role->display_name }}</span>
                                    @else
                                        <span class="badge bg-secondary">ไม่มี Role</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->is_active ?? true)
                                        <span class="badge bg-success">ใช้งาน</span>
                                    @else
                                        <span class="badge bg-danger">ปิดใช้งาน</span>
                                    @endif
                                </td>
                                <td>{{ optional($user->created_at)->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="text-muted">Coming soon</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">ไม่มีผู้ใช้งาน</h5>
                <p class="text-muted">ฟังก์ชันเพิ่มผู้ใช้งานจะพร้อมใช้งานเร็วๆ นี้</p>
                <button class="btn btn-secondary" disabled><i class="fas fa-plus me-1"></i> เพิ่มผู้ใช้งาน</button>
            </div>
        @endif
    </div>
</div>

<style>
.avatar-sm {
    width: 32px;
    height: 32px;
    font-size: 14px;
    font-weight: bold;
}
</style>
@endsection
