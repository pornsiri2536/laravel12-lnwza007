@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 mt-5">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>
                            เข้าสู่ระบบ
                        </h2>
                        <p class="text-muted">ยินดีต้อนรับกลับสู่ระบบ</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="login" class="form-label">
                                <i class="fas fa-user me-1"></i>
                                ชื่อผู้ใช้
                            </label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" 
                                   name="login" value="{{ old('login') }}" required autocomplete="username" autofocus placeholder="ระบุชื่อผู้ใช้">
                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-1"></i>
                                รหัสผ่าน
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                จดจำการเข้าสู่ระบบ
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                เข้าสู่ระบบ
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted">
                            ยังไม่มีบัญชี? 
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                สมัครสมาชิก
                            </a>
                        </p>
                        
                        @if (Route::has('password.request'))
                            <p class="text-muted">
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    ลืมรหัสผ่าน?
                                </a>
                            </p>
                        @endif
                    </div>

                    <!-- ข้อมูลทดสอบ -->
                    <div class="mt-4 p-3 bg-light rounded">
                        <h6 class="text-center text-muted mb-3">ข้อมูลทดสอบ</h6>
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted d-block">Super Admin:</small>
                                <small class="text-primary">admin@example.com</small><br>
                                <small class="text-muted">password</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Admin 2:</small>
                                <small class="text-primary">admin2@example.com</small><br>
                                <small class="text-muted">admin123</small>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <small class="text-muted d-block">Editor:</small>
                                <small class="text-primary">editor@example.com</small><br>
                                <small class="text-muted">editor123</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Author:</small>
                                <small class="text-primary">author@example.com</small><br>
                                <small class="text-muted">author123</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 15px;
}

.btn-primary {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.form-control {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

.alert {
    border-radius: 10px;
    border: none;
}

.bg-light {
    background-color: #f8f9fa !important;
    border-radius: 10px;
}
</style>
@endsection
