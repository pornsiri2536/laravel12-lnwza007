<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เว็บไซต์ท่องเที่ยว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .tourism-image {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
        }

        /* Admin Menu Styles */
        .navbar .dropdown-menu {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            padding: 10px 0;
            margin-top: 8px;
        }

        .navbar .dropdown-item {
            padding: 8px 20px;
            transition: all 0.3s ease;
            border-radius: 5px;
            margin: 2px 10px;
        }

        .navbar .dropdown-item:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateX(5px);
        }

        .navbar .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        /* Admin Crown Icon */
        .navbar .nav-link[href="#"]:has(.fa-crown) {
            color: #ffd700 !important;
            font-weight: 600;
        }

        .navbar .nav-link[href="#"]:has(.fa-crown):hover {
            color: #ffed4e !important;
        }

        /* User Menu */
        .navbar .nav-link[href="#"]:has(.fa-user) {
            color: #28a745 !important;
            font-weight: 500;
        }

        .navbar .nav-link[href="#"]:has(.fa-user):hover {
            color: #20c997 !important;
        }

        /* Login/Register Links */
        .navbar .nav-link[href*="login"] {
            color: #17a2b8 !important;
        }

        .navbar .nav-link[href*="register"] {
            color: #6f42c1 !important;
        }

        .navbar .nav-link[href*="login"]:hover,
        .navbar .nav-link[href*="register"]:hover {
            transform: translateY(-2px);
        }

        /* Responsive Admin Menu */
        @media (max-width: 768px) {
            .navbar .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                background-color: #f8f9fa;
                border: 1px solid #dee2e6;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">🌸 ท่องเที่ยวประเทศไทย</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- เมนู Home -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">🏠 หน้าหลัก</a>
                    </li>

                    <!-- เมนู ข่าว -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}" href="{{ route('news.index') }}">📰 ข่าว</a>
                    </li>

                    <!-- เมนู ข่าวการท่องเที่ยว -->
                    @php
                        $tourismNewsUrl = \Illuminate\Support\Facades\Route::has('tourism-news.index') ? route('tourism-news.index') : url('/tourism-news');
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tourism-news*') ? 'active' : '' }}" href="{{ $tourismNewsUrl }}">🌴 ข่าวการท่องเที่ยว</a>
                    </li>

                    <!-- เมนู สถานที่ท่องเที่ยว -->
                    @php
                        $tourismUrl = \Illuminate\Support\Facades\Route::has('tourism.index') ? route('tourism.index') : url('/tourism');
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tourism*') && !request()->is('tourism-news*') ? 'active' : '' }}" href="{{ $tourismUrl }}">🏞️ สถานที่ท่องเที่ยว</a>
                    </li>

                    <!-- เมนู เกี่ยวกับเรา -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">ℹ️ เกี่ยวกับเรา</a>
                    </li>
                </ul>

                <!-- เมนูด้านขวา -->
                <ul class="navbar-nav ms-auto">
                    @auth
                        <!-- เมนู Admin (สำหรับผู้ที่เข้าสู่ระบบแล้ว) -->
                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-crown me-1"></i>หลังบ้าน
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.content') }}">
                                        <i class="fas fa-edit me-2"></i>จัดการเนื้อหา
                                    </a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.user_mgmt.index') }}">
                                        <i class="fas fa-users me-2"></i>จัดการผู้ใช้งาน
                                    </a></li>
                                    @if(\Illuminate\Support\Facades\Route::has('admin.roles.index'))
                                        <li><a class="dropdown-item" href="{{ route('admin.roles.index') }}">
                                            <i class="fas fa-user-tag me-2"></i>จัดการ Roles
                                        </a></li>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Route::has('admin.permissions.index'))
                                        <li><a class="dropdown-item" href="{{ route('admin.permissions.index') }}">
                                            <i class="fas fa-key me-2"></i>จัดการ Permissions
                                        </a></li>
                                    @endif
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.settings') }}">
                                        <i class="fas fa-cog me-2"></i>การตั้งค่า
                                    </a></li>
                                </ul>
                            </li>
                        @endif

                        <!-- เมนูผู้ใช้งาน -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-1"></i>{{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                                </a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt me-2"></i>ออกจากระบบ
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- เมนูสำหรับผู้ที่ยังไม่ได้เข้าสู่ระบบ -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>เข้าสู่ระบบ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>สมัครสมาชิก
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- เนื้อหา -->
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
