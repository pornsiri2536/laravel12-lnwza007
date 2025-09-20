@extends('layouts.app')

@section('content')
<div class="container">
    <h2>สถานที่ท่องเที่ยว</h2>
    <!-- ปุ่มเพิ่มข้อมูล -->
    <a href="{{ route('tourism-place.form') }}" class="btn btn-success mb-3">เพิ่มสถานที่ท่องเที่ยว</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ชื่อสถานที่</th>
                <th>รายละเอียด</th>
                <th>รูปภาพ</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
            <tr>
                <td>{{ $place->name }}</td>
                <td>{{ $place->description }}</td>
                <td>
                    @if($place->image)
                        <img src="{!! asset('storage/' . $place->image) !!}" width="80">
                    @endif
                </td>
                <td>
                    <!-- ปุ่มแก้ไข -->
                    <a href="{{ route('tourism-place.edit', $place->id) }}" class="btn btn-warning">แก้ไข</a>
                    <!-- ปุ่มลบ -->
                    <form action="{{ route('tourism-place.delete', $place->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <p>ขอบคุณข้อมูล : <span>credit</span>
            <a href="https://thailandtravel.app/content/read/3947" target="_blank" class="btn btn-info" style="margin-left:10px;">
                ไปยังเว็บไซต์ต้นทาง
            </a>
        </p>
        <a href="{{ route('tourism-place.index') }}" class="btn btn-secondary mt-2">กลับหน้ารายการสถานที่ท่องเที่ยว</a>
    </div>
</div>
@endsection
