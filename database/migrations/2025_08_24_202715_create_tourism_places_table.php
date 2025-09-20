<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tourism_places', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // ชื่อสถานที่
            $table->string('image')->nullable(); // รูปภาพ
            $table->text('description')->nullable(); // รายละเอียด
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism_places');
    }
};

// ตาราง tourism_places รองรับ CRUD แล้ว
// สามารถเพิ่ม, แก้ไข, ลบข้อมูลได้ผ่าน Model และ Route ที่สร้างไว้
