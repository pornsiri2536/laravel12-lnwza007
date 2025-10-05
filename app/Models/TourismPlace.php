<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    use HasFactory;

    protected $table = 'tourism_places'; // ตารางในฐานข้อมูล
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'location',
        'status',
    ];
}
