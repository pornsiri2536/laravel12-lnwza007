<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เว็บไซต์ท่องเที่ยว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <ul class="navbar-nav ms-auto">

                    <!-- เมนู Home -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">🏠 หน้าหลัก</a>
                    </li>

                    <!-- เมนู ข่าว -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}" href="{{ route('news.index') }}">📰 ข่าว</a>
                    </li>

                    <!-- เมนู ข่าวการท่องเที่ยว -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tourism-news*') ? 'active' : '' }}" href="{{ route('tourism-news.index') }}">🌴 ข่าวการท่องเที่ยว</a>
                    </li>

                    <!-- เมนู สถานที่ท่องเที่ยว -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tourism*') && !request()->is('tourism-news*') ? 'active' : '' }}" href="{{ route('tourism.index') }}">🏞️ สถานที่ท่องเที่ยว</a>
                    </li>

                    <!-- เมนู เกี่ยวกับเรา -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ route('about') }}">ℹ️ เกี่ยวกับเรา</a>

                    </li>
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
