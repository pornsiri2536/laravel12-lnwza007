@extends('admin.layout')

@section('title', 'จัดการ Roles')
@section('page-title', 'จัดการ Roles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>รายการ Roles</h4>
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>
        เพิ่ม Role
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($roles->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ชื่อ Role</th>
                            <th>ชื่อแสดง</th>
                            <th>คำอธิบาย</th>
                            <th>จำนวน Permissions</th>
                            <th>สถานะ</th>
                            <th>วันที่สร้าง</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <code>{{ $role->name }}</code>
                                </td>
                                <td>
                                    <strong>{{ $role->display_name }}</strong>
                                </td>
                                <td>{{ $role->description ?? '-' }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $role->permissions->count() }}</span>
                                </td>
                                <td>
                                    @if($role->is_active)
                                        <span class="badge bg-success">ใช้งาน</span>
                                    @else
                                        <span class="badge bg-danger">ปิดใช้งาน</span>
                                    @endif
                                </td>
                                <td>{{ $role->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.roles.toggle-status', $role) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-{{ $role->is_active ? 'danger' : 'success' }}" 
                                                    onclick="return confirm('คุณต้องการ{{ $role->is_active ? 'ปิดใช้งาน' : 'เปิดใช้งาน' }} Role นี้หรือไม่?')">
                                                <i class="fas fa-{{ $role->is_active ? 'ban' : 'check' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('คุณต้องการลบ Role นี้หรือไม่?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $roles->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-user-tag fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">ไม่มี Roles</h5>
                <p class="text-muted">เริ่มต้นด้วยการเพิ่ม Role ใหม่</p>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    เพิ่ม Role
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
