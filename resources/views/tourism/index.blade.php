@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-center py-5 mb-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 20px; margin: 20px 0;">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">🏞️ สถานที่ท่องเที่ยวประเทศไทย 🏞️</h1>
            <p class="lead">ค้นพบสถานที่ท่องเที่ยวที่น่าสนใจและสวยงามจากทั่วประเทศไทย</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="container mb-4">
        <form method="GET" action="{{ route('tourism.index') }}" class="row g-2 justify-content-center">
            <div class="col-md-6">
                <input type="text" name="q" value="{{ $q ?? '' }}" class="form-control" placeholder="ค้นหาสถานที่ท่องเที่ยว (เช่น วัด น้ำตก เกาะ)">
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary"><i class="fas fa-search me-1"></i>ค้นหา</button>
            </div>
        </form>
    </div>

    <!-- Section Header -->
    <div class="section-header mb-4">
        <h2 class="section-title">🏞️ สถานที่ท่องเที่ยวแนะนำ</h2>
        <div class="section-line"></div>
    </div>

    <div class="grid-container mb-4">
        @forelse($places as $place)
            <div class="card shadow h-100">
                <div class="card-body d-flex flex-column">
                    @php
                        $imgSrc = null;
                        if (!empty($place->image)) {
                            $imgSrc = (\Illuminate\Support\Str::startsWith($place->image, ['http', '/']))
                                ? $place->image
                                : '/assets/img/tourism/' . ltrim($place->image, '/');
                        }
                    @endphp
                    @if($imgSrc)
                        <img src="{{ $imgSrc }}" alt="{{ $place->name }}" class="card-img-top" loading="lazy">
                    @else
                        <img src="https://picsum.photos/300/200?random={{ $place->id }}" alt="{{ $place->name }}" class="card-img-top">
                    @endif
                    <h5 class="card-title" style="font-size: 1rem; line-height: 1.3; height: 2.6rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $place->name }}</h5>
                    <p class="card-text text-muted flex-grow-1" style="font-size: 0.9rem; line-height: 1.4;">{{ Str::limit($place->description, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ $place->link ?: '#' }}" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-sm w-100">
                            <i class="fas fa-external-link-alt me-1"></i>ดูรายละเอียด
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted" style="grid-column: 1 / -1;">
                <i class="fas fa-info-circle fa-2x mb-2"></i>
                <p>ไม่พบสถานที่ท่องเที่ยวที่ค้นหา</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mb-5">
        {{ $places->links() }}
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
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 3rem;
        }
        
        /* Cards */
        .card {
            height: 100%;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
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
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        /* Card Images */
        .card img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
            filter: brightness(0.9);
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
        .btn-success {
            background: linear-gradient(45deg, #56ab2f, #a8e6cf);
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
            background: linear-gradient(45deg, #a8e6cf, #56ab2f);
            transition: left 0.3s ease;
        }
        .btn-success:hover::before {
            left: 0;
        }
        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(86, 171, 47, 0.4);
        }
        .btn-success i, .btn-success span {
            position: relative;
            z-index: 1;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 25px;
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
        .card:nth-child(5) { animation-delay: 0.5s; }
        .card:nth-child(6) { animation-delay: 0.6s; }
    </style>
@endsection
