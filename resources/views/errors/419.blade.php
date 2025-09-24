@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-body p-5 text-center">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h2 class="fw-bold mb-2">เซสชันหมดอายุ (419)</h2>
                    <p class="text-muted mb-4">หน้าที่คุณกำลังเข้าถึงหมดอายุ หรือโทเค็นความปลอดภัย (CSRF) ไม่ถูกต้อง</p>

                    <div class="text-start mx-auto" style="max-width: 520px;">
                        <ul class="text-muted">
                            <li>ลองรีเฟรชหน้า แล้วลองใหม่อีกครั้ง</li>
                            <li>เข้าสู่ระบบใหม่ หากคุณอยู่ห่างจากหน้านี้นานเกินไป</li>
                            <li>ตรวจให้แน่ใจว่าเปิดใช้งานคุกกี้ในเบราว์เซอร์</li>
                        </ul>
                    </div>

                    <div class="d-flex gap-2 justify-content-center mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> กลับหน้าก่อนหน้า
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-1"></i> ไปหน้าเข้าสู่ระบบ
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-success">
                            <i class="fas fa-home me-1"></i> ไปหน้าแรก
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center text-muted mt-3">
                <small>หากพบปัญหาซ้ำ โปรดลองกด Ctrl+F5 เพื่อล้างแคช และเปิดหน้าใหม่อีกครั้ง</small>
            </div>
        </div>
    </div>
</div>
@endsection
