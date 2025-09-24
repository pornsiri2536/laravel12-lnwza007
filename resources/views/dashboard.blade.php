@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </h1>
                <div class="text-muted">
                    ยินดีต้อนรับ, {{ auth()->user()->name }}!
                </div>
            </div>

            <!-- User Info Card -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fas fa-user me-2"></i>
                                ข้อมูลผู้ใช้งาน
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>ชื่อ:</strong> {{ auth()->user()->name }}</p>
                                    <p><strong>อีเมล:</strong> {{ auth()->user()->email }}</p>
                                    <p><strong>วันที่สมัคร:</strong> {{ auth()->user()->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Role:</strong> 
                                        @if(auth()->user()->role)
                                            <span class="badge bg-primary">{{ auth()->user()->role->display_name }}</span>
                                        @else
                                            <span class="badge bg-secondary">ไม่มี Role</span>
                                        @endif
                                    </p>
                                    <p><strong>สถานะ:</strong> 
                                        <span class="badge bg-success">ใช้งาน</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="fas fa-user-circle fa-3x text-primary mb-3"></i>
                            <h6>{{ auth()->user()->name }}</h6>
                            <p class="text-muted small">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-bolt me-2"></i>
                                    การดำเนินการด่วน (Admin)
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm w-100">
                                            <i class="fas fa-crown me-1"></i>
                                            หลังบ้าน
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.content') }}" class="btn btn-info btn-sm w-100">
                                            <i class="fas fa-edit me-1"></i>
                                            จัดการเนื้อหา
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.users') }}" class="btn btn-success btn-sm w-100">
                                            <i class="fas fa-users me-1"></i>
                                            จัดการผู้ใช้งาน
                                        </a>
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm w-100">
                                            <i class="fas fa-cog me-1"></i>
                                            การตั้งค่า
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Content Management -->
            @if(auth()->user()->hasPermissionTo('news.manage') || auth()->user()->hasPermissionTo('tourism.manage'))
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-edit me-2"></i>
                                    จัดการเนื้อหา
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if(auth()->user()->hasPermissionTo('news.manage'))
                                        <div class="col-md-3 mb-2">
                                            <a href="{{ route('news.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                                <i class="fas fa-newspaper me-1"></i>
                                                จัดการข่าว
                                            </a>
                                        </div>
                                    @endif
                                    @if(auth()->user()->hasPermissionTo('tourism.manage'))
                                        <div class="col-md-3 mb-2">
                                            <a href="{{ route('tourism-news.index') }}" class="btn btn-outline-success btn-sm w-100">
                                                <i class="fas fa-map-marked-alt me-1"></i>
                                                จัดการข่าวท่องเที่ยว
                                            </a>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <a href="{{ route('tourism.index') }}" class="btn btn-outline-info btn-sm w-100">
                                                <i class="fas fa-landmark me-1"></i>
                                                จัดการสถานที่ท่องเที่ยว
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Recent Activity -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-history me-2"></i>
                                กิจกรรมล่าสุด
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center text-muted py-4">
                                <i class="fas fa-info-circle fa-2x mb-3"></i>
                                <p>ยังไม่มีกิจกรรมล่าสุด</p>
                                <p class="small">กิจกรรมของคุณจะแสดงที่นี่</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px 10px 0 0 !important;
    border: none;
}

.btn {
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-warning {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    border: none;
    color: #2c3e50;
}

.btn-warning:hover {
    background: linear-gradient(45deg, #ffed4e, #ffd700);
    color: #2c3e50;
}

.badge {
    font-size: 0.8em;
    padding: 0.5em 0.8em;
    border-radius: 20px;
}
</style>
@endsection
