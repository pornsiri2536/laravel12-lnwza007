@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Hero Header -->
            <div class="card border-0 mb-4 hero-card">
                <div class="card-body d-flex flex-wrap align-items-center justify-content-between p-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="hero-icon">
                            <i class="fas fa-gauge-high"></i>
                        </div>
                        <div>
                            <h1 class="h3 mb-1 text-white">Dashboard</h1>
                            <div class="text-white-50 small">ยินดีต้อนรับกลับมา, {{ auth()->user()->name }}</div>
                        </div>
                    </div>
                    <div class="text-end mt-3 mt-md-0">
                        <span class="badge bg-light text-dark me-1"><i class="fas fa-id-badge me-1"></i>{{ auth()->user()->email }}</span>
                        <span class="badge bg-success"><i class="fas fa-circle-check me-1"></i>ใช้งาน</span>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="row g-3 mb-4">
                @php(
                    $stats = [
                        ['label' => 'ข่าวทั้งหมด', 'icon' => 'fa-newspaper', 'color' => 'primary', 'count' => \App\Models\News::count()],
                        ['label' => 'ข่าวท่องเที่ยว', 'icon' => 'fa-umbrella-beach', 'color' => 'success', 'count' => class_exists('App\\Models\\TourismNews') ? \App\Models\TourismNews::count() : 0],
                        ['label' => 'สถานที่ท่องเที่ยว', 'icon' => 'fa-map-location-dot', 'color' => 'info', 'count' => class_exists('App\\Models\\TourismPlace') ? \App\Models\TourismPlace::count() : 0],
                        ['label' => 'ผู้ใช้งานทั้งหมด', 'icon' => 'fa-users', 'color' => 'dark', 'count' => \App\Models\User::count()],
                        ['label' => 'Roles', 'icon' => 'fa-user-shield', 'color' => 'secondary', 'count' => class_exists('App\\Models\\Role') ? \App\Models\Role::count() : 0],
                        ['label' => 'Permissions', 'icon' => 'fa-key', 'color' => 'warning', 'count' => class_exists('App\\Models\\Permission') ? \App\Models\Permission::count() : 0],
                    ]
                )
                @foreach($stats as $s)
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card stats shadow-sm">
                            <div class="card-body d-flex align-items-center">
                                <div class="stats-icon bg-{{ $s['color'] }} bg-gradient">
                                    <i class="fas {{ $s['icon'] }}"></i>
                                </div>
                                <div class="ms-3">
                                    <div class="stats-number">{{ number_format($s['count']) }}</div>
                                    <div class="text-muted small">{{ $s['label'] }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                            <div class="avatar-circle bg-primary bg-gradient mb-3">
                                <i class="fas fa-user"></i>
                            </div>
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
                                        <a href="{{ route('admin.user_mgmt.index') }}" class="btn btn-success btn-sm w-100">
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
                                    <div class="col-12 mt-2">
                                        <div class="row g-2">
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.news.create') }}" class="btn btn-outline-primary btn-sm w-100"><i class="fas fa-plus me-1"></i>เพิ่มข่าว</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.tourism_news.create') }}" class="btn btn-outline-success btn-sm w-100"><i class="fas fa-plus me-1"></i>เพิ่มข่าวท่องเที่ยว</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.tourism_places.create') }}" class="btn btn-outline-info btn-sm w-100"><i class="fas fa-plus me-1"></i>เพิ่มสถานที่</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.pages.create') }}" class="btn btn-outline-secondary btn-sm w-100"><i class="fas fa-file-circle-plus me-1"></i>เพิ่มหน้า</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.user_mgmt.create') }}" class="btn btn-outline-dark btn-sm w-100"><i class="fas fa-user-plus me-1"></i>เพิ่มผู้ใช้</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-secondary btn-sm w-100"><i class="fas fa-user-shield me-1"></i>เพิ่ม Role</a>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-2">
                                                <a href="{{ route('admin.permissions.create') }}" class="btn btn-outline-warning btn-sm w-100"><i class="fas fa-key me-1"></i>เพิ่ม Permission</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Content Management (show for admin roles) -->
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
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
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary btn-sm w-100">
                                            <i class="fas fa-newspaper me-1"></i>
                                            จัดการข่าว
                                        </a>
                                    </div>
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
                                    <div class="col-md-3 mb-2">
                                        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                                            <i class="fas fa-file-alt me-1"></i>
                                            จัดการหน้าเว็บ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Chart & Recent Activity -->
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-chart-line me-2"></i>สรุปข่าว 7 วันล่าสุด</span>
                            <button id="themeToggle" class="btn btn-sm btn-light"><i class="fas fa-moon"></i></button>
                        </div>
                        <div class="card-body">
                            @php(
                                $days = collect(range(6,0))->map(fn($i) => now()->subDays($i)->format('Y-m-d'))
                            )
                            @php(
                                $newsByDay = \App\Models\News::selectRaw('date(created_at) as d, count(*) as c')
                                    ->where('created_at', '>=', now()->subDays(6)->startOfDay())
                                    ->groupBy('d')->pluck('c','d')->toArray()
                            )
                            <canvas id="newsChart" height="140"></canvas>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
                            <script>
                                (function(){
                                    const labels = @json($days->map(fn($d)=>\Carbon\Carbon::parse($d)->format('d/m')));
                                    const values = @json($days->map(fn($d)=>$newsByDay[$d] ?? 0));
                                    const ctx = document.getElementById('newsChart');
                                    const chart = new Chart(ctx, {
                                        type: 'line',
                                        data: { labels, datasets: [{ label: 'ข่าว', data: values, borderColor: '#5b7cfa', backgroundColor: 'rgba(91,124,250,0.15)', tension: .3, fill: true }] },
                                        options: { responsive: true, plugins: { legend: { display: false } }, scales: { y: { beginAtZero: true } } }
                                    });
                                    document.getElementById('themeToggle').addEventListener('click', function(){
                                        document.documentElement.classList.toggle('dark');
                                    });
                                })();
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="fas fa-history me-2"></i>
                                กิจกรรมล่าสุด
                            </h5>
                        </div>
                        <div class="card-body">
                            @php($latestNews = \App\Models\News::latest()->limit(5)->get())
                            @if($latestNews->count())
                                <ul class="list-group list-group-flush">
                                    @foreach($latestNews as $n)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <div class="me-2 text-truncate" style="max-width:70%">
                                                <i class="fas fa-newspaper text-primary me-2"></i>{{ $n->title ?? 'ข่าว' }}
                                                <div class="small text-muted text-truncate">{{ \Illuminate\Support\Str::limit($n->summary ?? '', 80) }}</div>
                                            </div>
                                            <span class="badge bg-light text-dark">{{ optional($n->created_at)->format('d/m H:i') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="text-center text-muted py-4">
                                    <i class="fas fa-info-circle fa-2x mb-3"></i>
                                    <p>ยังไม่มีกิจกรรมล่าสุด</p>
                                    <p class="small">กิจกรรมของคุณจะแสดงที่นี่</p>
                                </div>
                            @endif
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
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    border-radius: 14px;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 14px 14px 0 0 !important;
    border: none;
}

.btn {
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.2s ease;
}

.btn:hover { transform: translateY(-2px); }

.btn-warning {
    background: linear-gradient(45deg, #ffd700, #ffed4e);
    border: none;
    color: #2c3e50;
}

.btn-warning:hover { background: linear-gradient(45deg, #ffed4e, #ffd700); }

.badge { font-size: 0.8em; padding: 0.5em 0.8em; border-radius: 20px; }

/* Hero */
.hero-card { background: linear-gradient(135deg, #5b7cfa 0%, #8e5ae8 100%); }
.hero-icon { width: 56px; height: 56px; border-radius: 50%; display:flex; align-items:center; justify-content:center; background: rgba(255,255,255,0.15); color:#fff; font-size: 1.25rem; }

/* Stats */
.stats-icon { width: 44px; height: 44px; border-radius: 12px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:1.1rem; }
.stats-number { font-size: 1.6rem; font-weight: 800; }

/* Avatar */
.avatar-circle { width: 72px; height: 72px; border-radius: 50%; display:flex; align-items:center; justify-content:center; color:#fff; font-size: 1.5rem; }

/* Simple Dark Mode for the card area */
.dark .card { background-color: #1f2937; color: #e5e7eb; }
.dark .card-header { background: linear-gradient(135deg, #111827 0%, #1f2937 100%); color: #e5e7eb; }
.dark .list-group-item { background-color: #111827; color: #e5e7eb; border-color: #374151; }
.dark .badge.bg-light { background-color: #374151 !important; color: #e5e7eb !important; }
</style>
@endsection
