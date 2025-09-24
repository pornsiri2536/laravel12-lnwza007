@extends('admin.layout')

@section('title','จัดการสถานที่ท่องเที่ยว')
@section('page-title','จัดการสถานที่ท่องเที่ยว (Tourism Places)')

@section('content')
<div class="card mb-4">
    <div class="card-body d-flex justify-content-between align-items-center">
        <form method="GET" class="d-flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="ค้นหา...">
            <button class="btn btn-outline-primary"><i class="fas fa-search me-1"></i>ค้นหา</button>
        </form>
        <a href="{{ route('admin.tourism_places.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> เพิ่มสถานที่
        </a>
    </div>
</div>

@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:48px">#</th>
                        <th>ชื่อสถานที่</th>
                        <th style="width:200px">ลิงก์</th>
                        <th style="width:160px">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $i => $item)
                        <tr>
                            <td>{{ $items->firstItem() + $i }}</td>
                            <td>
                                <div class="fw-semibold">{{ Str::limit($item->name, 80) }}</div>
                                <small class="text-muted">{{ Str::limit(strip_tags($item->description), 100) }}</small>
                            </td>
                            <td>
                                @if($item->link)
                                    <a href="{{ $item->link }}" target="_blank" rel="noopener">เปิดลิงก์</a>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.tourism_places.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.tourism_places.destroy', $item->id) }}" onsubmit="return confirm('ยืนยันลบรายการนี้?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">ยังไม่มีข้อมูล</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-3 d-flex justify-content-end">
    {{ $items->withQueryString()->links() }}
</div>
@endsection
