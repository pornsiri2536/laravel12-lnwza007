@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Statistics Cards -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">ผู้ใช้งาน</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['users'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">ข่าวสาร</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['news'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">ข่าวท่องเที่ยว</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['tourism_news'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marked-alt fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stats-card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">สถานที่ท่องเที่ยว</div>
                        <div class="h5 mb-0 font-weight-bold">{{ $stats['tourism_places'] }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-landmark fa-2x text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent News -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-newspaper me-2"></i>
                    ข่าวล่าสุด
                </h6>
                <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-primary">ดูทั้งหมด</a>
            </div>
            <div class="card-body">
                @if($recent_news->count() > 0)
                    @foreach($recent_news as $news)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-circle text-primary" style="font-size: 8px;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ Str::limit($news->title, 50) }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ optional($news->created_at)->format('d/m/Y H:i') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center">ไม่มีข่าวล่าสุด</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Tourism News -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-map-marked-alt me-2"></i>
                    ข่าวท่องเที่ยวล่าสุด
                </h6>
                <a href="{{ route('admin.tourism_news.index') }}" class="btn btn-sm btn-outline-primary">ดูทั้งหมด</a>
            </div>
            <div class="card-body">
                @if($recent_tourism_news->count() > 0)
                    @foreach($recent_tourism_news as $tourismNews)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="fas fa-circle text-success" style="font-size: 8px;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ Str::limit($tourismNews->title, 50) }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ optional($tourismNews->created_at)->format('d/m/Y H:i') }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center">ไม่มีข่าวท่องเที่ยวล่าสุด</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Recent Tourism Places -->
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-landmark me-2"></i>
                    สถานที่ท่องเที่ยวล่าสุด
                </h6>
                <a href="{{ route('admin.tourism_places.index') }}" class="btn btn-sm btn-outline-primary">ดูทั้งหมด</a>
            </div>
            <div class="card-body">
                @if($recent_places->count() > 0)
                    <div class="row">
                        @foreach($recent_places as $place)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ Str::limit($place->name, 30) }}</h6>
                                        <p class="card-text text-muted small">
                                            {{ Str::limit($place->description, 80) }}
                                        </p>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ optional($place->created_at)->format('d/m/Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center">ไม่มีสถานที่ท่องเที่ยวล่าสุด</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-bolt me-2"></i>
                    การดำเนินการด่วน
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มข่าว
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="{{ route('admin.tourism_news.create') }}" class="btn btn-success btn-sm w-100">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มข่าวการท่องเที่ยว
                        </a>
                    </div>
                    <div class="col-md-4 mb-2">
                        <a href="{{ route('admin.tourism_places.create') }}" class="btn btn-info btn-sm w-100">
                            <i class="fas fa-plus me-1"></i>
                            เพิ่มสถานที่ท่องเที่ยว
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
