<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ตาราง roles (กรณีไม่มี)
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');          // ชื่อ role เช่น admin, user
                $table->string('guard_name');    // ค่า default = web
                $table->timestamps();
            });
        }

        // ตาราง model_has_roles
        if (!Schema::hasTable('model_has_roles')) {
            Schema::create('model_has_roles', function (Blueprint $table) {
                $table->unsignedBigInteger('role_id');
                $table->unsignedBigInteger('model_id');
                $table->string('model_type');

                $table->index(['model_id', 'model_type'], 'model_has_roles_model_id_model_type_index');

                $table->foreign('role_id')
                      ->references('id')->on('roles')
                      ->onDelete('cascade');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('model_has_roles');
        // ถ้าอยากลบ roles ด้วยก็เปิดบรรทัดนี้
        // Schema::dropIfExists('roles');
    }
};
