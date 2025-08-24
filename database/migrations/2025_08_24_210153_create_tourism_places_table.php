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
        Schema::create('tourism_news', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // หัวข้อข่าว
            $table->text('content');          // เนื้อหาข่าว
            $table->string('image')->nullable(); // รูปภาพข่าว
            $table->date('published_at')->nullable(); // วันที่เผยแพร่
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism_news');
    }
};
