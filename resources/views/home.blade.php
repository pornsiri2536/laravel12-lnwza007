@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="hero-section text-center py-5 mb-5">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">🌸 ยินดีต้อนรับสู่เว็บไซต์ท่องเที่ยวประเทศไทย 🌸</h1>
        <p class="lead">ค้นพบความงามและวัฒนธรรมอันหลากหลายของประเทศไทย</p>
        @auth
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                <div class="mt-4">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-lg me-3">
                        <i class="fas fa-crown me-2"></i> เข้าสู่ระบบหลังบ้าน
                    </a>
                    <a href="{{ route('admin.content') }}" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-edit me-2"></i> จัดการเนื้อหา
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
    @foreach($news ?? [] as $item)
        <div class="card shadow h-100">
            @php
                $img = !empty($item->image)
                    ? (Str::startsWith($item->image, ['http', '/'])
                        ? $item->image
                        : (file_exists(public_path('assets/img/news/' . $item->image))
                            ? '/assets/img/news/' . $item->image
                            : '/assets/img/tourism/' . $item->image))
                    : 'https://picsum.photos/300/200?random=' . $item->id;
            @endphp
            <img src="{{ $img }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                <div class="mt-auto">
                    <a href="{{ $item->link ?: '#' }}" target="_blank" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-external-link-alt me-1"></i>อ่านต่อ
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="text-end mb-5">
    <a href="{{ Route::has('news.index') ? route('news.index') : url('/news') }}" class="btn btn-outline-secondary">ดูข่าวทั้งหมด</a>
</div>

<!-- ข่าวการท่องเที่ยวล่าสุด -->
<div class="section-header mb-4">
    <h2 class="section-title">🌴 ข่าวการท่องเที่ยวล่าสุด</h2>
    <div class="section-line"></div>
    <a href="{{ Route::has('tourism.index') ? route('tourism.index') : url('/tourism') }}" class="btn btn-outline-secondary">ดูสถานที่ทั้งหมด</a>
</div>
<div class="grid-container mb-4">
    @foreach($tourismNews ?? [] as $item)
        <div class="card shadow h-100">
            @php
                $tnImg = !empty($item->image)
                    ? (Str::startsWith($item->image, ['http', '/'])
                        ? $item->image
                        : (file_exists(public_path('assets/img/news/' . $item->image))
                            ? '/assets/img/news/' . $item->image
                            : '/assets/img/tourism/' . $item->image))
                    : 'https://picsum.photos/300/200?random=' . $item->id;
            @endphp
            <img src="{{ $tnImg }}" alt="{{ $item->title }}" class="card-img-top" loading="lazy">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $item->title }}</h5>
                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                @if($item->eventDates->count() > 0)
                    <small class="text-muted mb-2">📅 {{ \Carbon\Carbon::parse($item->eventDates->first()->start_date)->format('d/m/Y') }}</small>
                @endif
                <div class="mt-auto">
                    <a href="{{ $item->link ?: '#' }}" target="_blank" class="btn btn-success btn-sm w-100">
                        <i class="fas fa-external-link-alt me-1"></i>อ่านต่อ
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- สถานที่ท่องเที่ยวแนะนำ -->
<div class="section-header mb-4">
    <h2 class="section-title">🏞️ สถานที่ท่องเที่ยวแนะนำ</h2>
    <div class="section-line"></div>
</div>
<div class="grid-container mb-4">
    @foreach($places ?? [] as $place)
        <div class="card shadow h-100">
            @php
                $plImg = !empty($place->image)
                    ? (Str::startsWith($place->image, ['http', '/']) ? $place->image : '/assets/img/tourism/' . $place->image)
                    : 'https://picsum.photos/300/200?random=' . $place->id;
            @endphp
            <img src="{{ $plImg }}" alt="{{ $place->name }}" class="card-img-top" loading="lazy">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $place->name }}</h5>
                <p class="card-text text-muted flex-grow-1">{{ Str::limit($place->description, 100) }}</p>
                <div class="mt-auto">
                    <a href="{{ $place->link ?: '#' }}" target="_blank" class="btn btn-success btn-sm w-100">
                        ดูรายละเอียด
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="text-end mb-5">
    <a href="{{ Route::has('tourism.index') ? route('tourism.index') : url('/tourism') }}" class="btn btn-outline-secondary">ดูสถานที่ทั้งหมด</a>
</div>

<!-- CSS + Animation -->
<style>
.hero-section {
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 20px;
    margin: 20px 0;
}
.hero-section::before {
    content: '';
    position: absolute; top:0; left:0; right:0; bottom:0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}
.section-header { text-align:center; margin-bottom:2rem; }
.section-title { font-size:2.5rem; font-weight:700; color:#2c3e50; margin-bottom:1rem; display:inline-block; position:relative; }
.section-title::after { content:''; position:absolute; bottom:-10px; left:50%; transform:translateX(-50%); width:60px; height:4px; background:linear-gradient(45deg,#667eea,#764ba2); border-radius:2px; }
.section-line { width:100px; height:2px; background:linear-gradient(45deg,#667eea,#764ba2); margin:0 auto; border-radius:1px; }
.grid-container { display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:28px; margin-bottom:3rem; }
.card { border-radius
