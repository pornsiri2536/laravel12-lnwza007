@extends('admin.layout')

@section('title', 'จัดการ Permissions')
@section('page-title', 'จัดการ Permissions')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4>รายการ Permissions</h4>
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i>
        เพิ่ม Permission
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($permissions->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ชื่อ Permission</th>
                            <th>ชื่อแสดง</th>
                            <th>กลุ่ม</th>
                            <th>คำอธิบาย</th>
                            <th>สถานะ</th>
                            <th>วันที่สร้าง</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <code>{{ $permission->name }}</code>
                                </td>
                                <td>
                                    <strong>{{ $permission->display_name }}</strong>
                                </td>
                                <td>
                                    @if($permission->group)
                                        <span class="badge bg-secondary">{{ $permission->group }}</span>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $permission->description ?? '-' }}</td>
                                <td>
                                    @if($permission->is_active)
                                        <span class="badge bg-success">ใช้งาน</span>
                                    @else
                                        <span class="badge bg-danger">ปิดใช้งาน</span>
                                    @endif
                                </td>
                                <td>{{ $permission->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.permissions.edit', $permission) }}" class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.permissions.toggle-status', $permission) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-{{ $permission->is_active ? 'danger' : 'success' }}" 
                                                    onclick="return confirm('คุณต้องการ{{ $permission->is_active ? 'ปิดใช้งาน' : 'เปิดใช้งาน' }} Permission นี้หรือไม่?')">
                                                <i class="fas fa-{{ $permission->is_active ? 'ban' : 'check' }}"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                    onclick="return confirm('คุณต้องการลบ Permission นี้หรือไม่?')">
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
                {{ $permissions->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-key fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">ไม่มี Permissions</h5>
                <p class="text-muted">เริ่มต้นด้วยการเพิ่ม Permission ใหม่</p>
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    เพิ่ม Permission
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
