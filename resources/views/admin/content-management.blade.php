@extends('admin.layout')

@section('title', 'จัดการเนื้อหา')
@section('page-title', 'จัดการเนื้อหา')

@section('content')
<div class="row">
    <!-- News Management -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-newspaper me-2"></i>
                    จัดการข่าวสาร
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">จัดการข่าวสารและบทความต่างๆ ของเว็บไซต์</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-1"></i>
                        ดูรายการข่าว
                    </a>
                    @can('news.create')
                        <a href="{{ route('news.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มข่าวใหม่
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!-- Tourism News Management -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-map-marked-alt me-2"></i>
                    จัดการข่าวท่องเที่ยว
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">จัดการข่าวสารเกี่ยวกับการท่องเที่ยวและกิจกรรม</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('tourism-news.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-1"></i>
                        ดูรายการข่าวท่องเที่ยว
                    </a>
                    @can('tourism.create')
                        <a href="{{ route('tourism-news.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มข่าวท่องเที่ยวใหม่
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!-- Tourism Places Management -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-landmark me-2"></i>
                    จัดการสถานที่ท่องเที่ยว
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">จัดการข้อมูลสถานที่ท่องเที่ยวและจุดสนใจ</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('tourism.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-1"></i>
                        ดูรายการสถานที่ท่องเที่ยว
                    </a>
                    @can('tourism.create')
                        <a href="{{ route('tourism.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มสถานที่ท่องเที่ยวใหม่
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    <!-- Product Management -->
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-shopping-cart me-2"></i>
                    จัดการสินค้า
                </h6>
            </div>
            <div class="card-body">
                <p class="text-muted">จัดการข้อมูลสินค้าและบริการต่างๆ</p>
                <div class="d-grid gap-2">
                    <a href="{{ route('product.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-list me-1"></i>
                        ดูรายการสินค้า
                    </a>
                    @can('product.create')
                        <a href="{{ route('product.form') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มสินค้าใหม่
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-chart-bar me-2"></i>
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
@endsection
