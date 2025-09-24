@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-center py-5 mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px; margin: 20px 0;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">🌸 ยินดีต้อนรับสู่เว็บไซต์ท่องเที่ยวประเทศไทย 🌸</h1>
            <p class="lead">ค้นพบความงามและวัฒนธรรมอันหลากหลายของประเทศไทย</p>
            
            <!-- Admin Access Button -->
            @auth
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                    <div class="mt-4">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-lg me-3">
                            <i class="fas fa-crown me-2"></i>
                            เข้าสู่ระบบหลังบ้าน
                        </a>
                        <a href="{{ route('admin.content') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-edit me-2"></i>
                            จัดการเนื้อหา
                        </a>
                    </div>
                @endif
            @endauth
        </div>
    </div>

    <!-- ข่าวล่าสุด -->
    <div class="section-header mb-4">
        <h2 class="section-title">📰 ข่าวล่าสุด</h2>
        <div class="section-line"></div>
    </div>
    <div class="grid-container mb-4">
        @foreach($news as $item)
            <div class="card shadow h-100">
                <div class="card-body d-flex flex-column">
                    @php
                        $img = null;
                        if (!empty($item->image)) {
                            if (\Illuminate\Support\Str::startsWith($item->image, ['http', '/'])) {
                                $img = $item->image;
                            } else {
                                $candidateNews = '/assets/img/news/' . ltrim($item->image, '/');
                                $candidateTour = '/assets/img/tourism/' . ltrim($item->image, '/');
                                $img = file_exists(public_path(ltrim($candidateNews, '/'))) ? $candidateNews : $candidateTour;
                            }
                        }
                    @endphp
                    @if($img)
                        <img src="{{ $img }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                    @else
                        <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                    @endif
                    <h5 class="card-title" style="font-size: 1rem; line-height: 1.3; height: 2.6rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->title }}</h5>
                    <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem; line-height: 1.4; height: 4.2rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ strip_tags($item->description) }}</p>
                    <div class="mt-auto">
                        <a href="{{ $item->link ?: '#' }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm w-100">
                            <i class="fas fa-external-link-alt me-1"></i>อ่านต่อ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('news.index') }}" class="btn btn-outline-secondary">ดูข่าวทั้งหมด</a>
    </div>

    <!-- ข่าวการท่องเที่ยว -->
    <div class="section-header mb-4">
        <h2 class="section-title">🌴 ข่าวการท่องเที่ยวล่าสุด</h2>
        <div class="section-line"></div>
    </div>
    <div class="grid-container mb-4">
        @foreach($tourismNews as $item)
            <div class="card shadow h-100">
                <div class="card-body d-flex flex-column">
                    @php
                        $tnImg = null;
                        if (!empty($item->image)) {
                            if (\Illuminate\Support\Str::startsWith($item->image, ['http', '/'])) {
                                $tnImg = $item->image;
                            } else {
                                $candidateNews = '/assets/img/news/' . ltrim($item->image, '/');
                                $candidateTour = '/assets/img/tourism/' . ltrim($item->image, '/');
                                $tnImg = file_exists(public_path(ltrim($candidateNews, '/'))) ? $candidateNews : $candidateTour;
                            }
                        }
                    @endphp
                    @if($tnImg)
                        <img src="{{ $tnImg }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                    @else
                        <img src="https://picsum.photos/300/200?random={{ $item->id }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                    @endif
                    <h5 class="card-title" style="font-size: 1rem; line-height: 1.3; height: 2.6rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $item->title }}</h5>
                    <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem; line-height: 1.4; height: 4.2rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">{{ strip_tags($item->description) }}</p>
                    
                    @if($item->eventDates->count() > 0)
                        <small class="text-muted d-block mb-2">
                            📅 {{ \Carbon\Carbon::parse($item->eventDates->first()->start_date)->format('d/m/Y') }}
                        </small>
                    @endif
                    
                    <div class="mt-auto">
                        <a href="{{ $item->link ?: '#' }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm w-100">
                            <i class="fas fa-external-link-alt me-1"></i>อ่านต่อ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('tourism-news.index') }}" class="btn btn-outline-secondary">ดูข่าวการท่องเที่ยวทั้งหมด</a>
    </div>

    <!-- สถานที่ท่องเที่ยว -->
    <div class="section-header mb-4">
        <h2 class="section-title">🏞️ สถานที่ท่องเที่ยวแนะนำ</h2>
        <div class="section-line"></div>
    </div>
    <div class="grid-container mb-4">
        @foreach($places as $place)
            <div class="card shadow h-100">
                @php
                    $plImg = null;
                    if (!empty($place->image)) {
                        if (\Illuminate\Support\Str::startsWith($place->image, ['http', '/'])) {
                            $plImg = $place->image;
                        } else {
                            $plImg = '/assets/img/tourism/' . ltrim($place->image, '/');
                        }
                    }
                @endphp
                @if($plImg)
                    <img src="{{ $plImg }}" alt="{{ $place->name }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                @else
                    <img src="https://picsum.photos/300/200?random={{ $place->id }}" alt="{{ $place->name }}" class="card-img-top" loading="lazy" style="height: 220px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title" style="font-size: 1rem; line-height: 1.3; height: 2.6rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $place->name }}</h5>
                    <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;">{{ Str::limit($place->description, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ $place->link ?: '#' }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm w-100">
                            <i class="fas fa-external-link-alt me-1"></i>ดูรายละเอียด
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-end mb-5">
        <a href="{{ route('tourism.index') }}" class="btn btn-outline-secondary">ดูสถานที่ทั้งหมด</a>
    </div>

    <!-- เพิ่ม CSS -->
    <style>
        /* Hero Section */
        .hero-section {
            position: relative;
            overflow: hidden;
        }
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }
        
        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 2px;
        }
        .section-line {
            width: 100px;
            height: 2px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            margin: 0 auto;
            border-radius: 1px;
        }
        
        /* Grid Container */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
            margin-bottom: 3rem;
        }
        
        /* Cards */
        .card {
            height: 100%;
            transition: transform .25s ease, box-shadow .25s ease;
            border: none;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            background: white;
            position: relative;
        }
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .card:hover::before {
            opacity: 1;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(0,0,0,0.12);
        }
        
        /* Card Images */
        .card img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
            filter: brightness(0.95);
            border-bottom: 1px solid #f1f3f5;
        }
        .card:hover img {
            transform: scale(1.08);
            filter: brightness(1);
        }
        
        /* Card Body */
        .card-body {
            padding: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }
        .card-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        .card-text {
            color: #6c757d;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }
        
        /* Buttons */
        .btn-primary {
            background: linear-gradient(45deg, #3b82f6, #6366f1);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 12px 24px;
            transition: transform .2s ease, box-shadow .2s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,.2), rgba(255,255,255,0));
            transition: left 0.4s ease;
        }
        .btn-primary:hover::before {
            left: 0;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(59,130,246,.35);
        }
        .btn-primary i, .btn-primary span {
            position: relative;
            z-index: 1;
        }
        
        .btn-success {
            background: linear-gradient(45deg, #22c55e, #16a34a);
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 12px 24px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-success::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255,255,255,.2), rgba(255,255,255,0));
            transition: left 0.3s ease;
        }
        .btn-success:hover::before {
            left: 0;
        }
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 18px rgba(34, 197, 94, .35);
        }
        .btn-success i, .btn-success span {
            position: relative;
            z-index: 1;
        }
        
        /* View All Buttons */
        .btn-outline-secondary {
            border: 2px solid #667eea;
            color: #667eea;
            border-radius: 25px;
            padding: 10px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-outline-secondary:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 18px;
            }
            .card img {
                height: 200px;
            }
            .section-title {
                font-size: 2rem;
            }
        }
        @media (max-width: 576px) {
            .grid-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .hero-section {
                margin: 10px 0;
                padding: 2rem 1rem;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .card {
            animation: fadeInUp 0.6s ease forwards;
        }
        .card:nth-child(1) { animation-delay: 0.1s; }
        .card:nth-child(2) { animation-delay: 0.2s; }
        .card:nth-child(3) { animation-delay: 0.3s; }
        .card:nth-child(4) { animation-delay: 0.4s; }

        /* Hero Section Buttons */
        .hero-section .btn {
            border-radius: 25px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .hero-section .btn-warning {
            background: linear-gradient(45deg, #ffd700, #ffed4e);
            border: none;
            color: #2c3e50;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }

        .hero-section .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 215, 0, 0.4);
            color: #2c3e50;
        }

        .hero-section .btn-outline-light {
            border: 2px solid rgba(255, 255, 255, 0.8);
            color: white;
            background: transparent;
        }

        .hero-section .btn-outline-light:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
            color: white;
            transform: translateY(-3px);
        }

        .hero-section .btn-light {
            background: rgba(255, 255, 255, 0.9);
            color: #2c3e50;
            border: none;
        }

        .hero-section .btn-light:hover {
            background: white;
            color: #2c3e50;
            transform: translateY(-3px);
        }

        /* Button Icons */
        .hero-section .btn i {
            margin-right: 8px;
        }
    </style>
@endsection
