@extends('admin.layout')

@section('title','จัดการผู้ใช้งาน')
@section('page-title','จัดการผู้ใช้งาน (Users)')

@section('content')
<div class="card mb-4">
    <div class="card-body d-flex justify-content-between align-items-center">
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="ค้นหาชื่อหรืออีเมล...">
            <button class="btn btn-outline-primary"><i class="fas fa-search me-1"></i>ค้นหา</button>
        </form>
        <a href="{{ route('admin.user_mgmt.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus me-1"></i> เพิ่มผู้ใช้งาน
        </a>
    </div>
</div>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:48px">#</th>
                        <th>ชื่อ</th>
                        <th>อีเมล</th>
                        <th style="width:120px">สถานะ</th>
                        <th style="width:240px">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $i => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->is_active ?? true)
                                    <span class="badge bg-success">ใช้งาน</span>
                                @else
                                    <span class="badge bg-danger">ปิดใช้งาน</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.user_mgmt.edit', ['user_mgmt' => $user->id]) }}" class="btn btn-sm btn-outline-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.user_mgmt.toggle-status', ['user_mgmt' => $user->id]) }}" onsubmit="return confirm('ยืนยันเปลี่ยนสถานะผู้ใช้งานนี้?')">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-sm btn-outline-secondary">
                                                <i class="fas fa-power-off"></i>
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.user_mgmt.destroy', ['user_mgmt' => $user->id]) }}" onsubmit="return confirm('ยืนยันลบผู้ใช้งานนี้?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">ยังไม่มีผู้ใช้งาน</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $users->withQueryString()->links() }}
</div>
@endsection
