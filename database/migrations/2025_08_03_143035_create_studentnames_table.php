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
        Schema::create('studentnames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('integer')->nullable();
            $table->string('float')->nullable();
            $table->integer('string')->nullable();
            $table->integer('date')->nullable();
            $table->integer('text')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentnames');
    }
};
