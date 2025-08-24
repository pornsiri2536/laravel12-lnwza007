<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เว็บท่องเที่ยวปทุมธานี</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Pathumthani Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('tourism.pathumthani') }}">สถานที่ท่องเที่ยว</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">เกี่ยวกับเรา</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">ติดต่อ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>© {{ date('Y') }} เว็บท่องเที่ยวปทุมธานี | ข้อมูลจาก 
            <a href="https://thai.tourismthailand.org/Destinations/Provinces/ปทุมธานี/227" class="text-white" target="_blank">
                การท่องเที่ยวแห่งประเทศไทย (TAT)
            </a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
