@extends('admin.layout')

@section('title', 'การตั้งค่า')
@section('page-title', 'การตั้งค่า')

@section('content')
<div class="row">
    <!-- System Information -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-info-circle me-2"></i>
                    ข้อมูลระบบ
                </h6>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>เวอร์ชัน Laravel:</strong></td>
                        <td>{{ app()->version() }}</td>
                    </tr>
                    <tr>
                        <td><strong>เวอร์ชัน PHP:</strong></td>
                        <td>{{ PHP_VERSION }}</td>
                    </tr>
                    <tr>
                        <td><strong>Environment:</strong></td>
                        <td>
                            <span class="badge bg-{{ app()->environment() === 'production' ? 'success' : 'warning' }}">
                                {{ app()->environment() }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Debug Mode:</strong></td>
                        <td>
                            <span class="badge bg-{{ config('app.debug') ? 'danger' : 'success' }}">
                                {{ config('app.debug') ? 'เปิด' : 'ปิด' }}
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- User Statistics -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-users me-2"></i>
                    สถิติผู้ใช้งาน
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-primary">{{ \App\Models\User::count() }}</h4>
                        <p class="text-muted mb-0">ผู้ใช้งานทั้งหมด</p>
                    </div>
                    <div class="col-6">
                        <h4 class="text-success">{{ \App\Models\Role::count() }}</h4>
                        <p class="text-muted mb-0">Roles</p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-6">
                        <h4 class="text-info">{{ \App\Models\Permission::count() }}</h4>
                        <p class="text-muted mb-0">Permissions</p>
                    </div>
                    <div class="col-6">
                        <h4 class="text-warning">{{ \App\Models\User::where('created_at', '>=', now()->subMonth())->count() }}</h4>
                        <p class="text-muted mb-0">ผู้ใช้ใหม่ (30 วัน)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Statistics -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-pie me-2"></i>
                    สถิติเนื้อหา
                </h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="border-end">
                            <h4 class="text-primary">{{ \App\Models\News::count() }}</h4>
                            <p class="text-muted mb-0">ข่าวสาร</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h4 class="text-success">{{ \App\Models\TourismNews::count() }}</h4>
                            <p class="text-muted mb-0">ข่าวท่องเที่ยว</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="border-end">
                            <h4 class="text-info">{{ \App\Models\TourismPlace::count() }}</h4>
                            <p class="text-muted mb-0">สถานที่ท่องเที่ยว</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="text-warning">{{ \App\Models\Product::count() }}</h4>
                        <p class="text-muted mb-0">สินค้า</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Database Management -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-database me-2"></i>
                    จัดการฐานข้อมูล
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">เครื่องมือสำหรับจัดการฐานข้อมูล</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="alert('ฟีเจอร์นี้จะพัฒนาในอนาคต')">
                        <i class="fas fa-download me-1"></i>
                        สำรองข้อมูล
                    </button>
                    <button class="btn btn-outline-warning" onclick="alert('ฟีเจอร์นี้จะพัฒนาในอนาคต')">
                        <i class="fas fa-upload me-1"></i>
                        กู้คืนข้อมูล
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cache Management -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-broom me-2"></i>
                    จัดการ Cache
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">ล้างข้อมูล Cache เพื่อปรับปรุงประสิทธิภาพ</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="alert('ฟีเจอร์นี้จะพัฒนาในอนาคต')">
                        <i class="fas fa-trash me-1"></i>
                        ล้าง Cache
                    </button>
                    <button class="btn btn-outline-success" onclick="alert('ฟีเจอร์นี้จะพัฒนาในอนาคต')">
                        <i class="fas fa-sync me-1"></i>
                        รีเฟรช Cache
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Security Settings -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-shield-alt me-2"></i>
                    การตั้งค่าความปลอดภัย
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>การเข้าถึงระบบ Admin</h6>
                        <p class="text-muted small">เฉพาะผู้ที่มีสิทธิ์ admin หรือ super_admin เท่านั้น</p>
                        <span class="badge bg-success">เปิดใช้งาน</span>
                    </div>
                    <div class="col-md-6">
                        <h6>การตรวจสอบสิทธิ์</h6>
                        <p class="text-muted small">ระบบจะตรวจสอบสิทธิ์ก่อนเข้าถึงแต่ละหน้า</p>
                        <span class="badge bg-success">เปิดใช้งาน</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
