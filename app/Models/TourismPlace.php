<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description', 
        'image',
        'link',
    ];

    // เพิ่มข้อมูลสถานที่ท่องเที่ยว
    public static function addPlace($data)
    {
        return self::create($data);
    }

    // แก้ไขข้อมูลสถานที่ท่องเที่ยว
    public static function updatePlace($id, $data)
    {
        $place = self::findOrFail($id);
        $place->update($data);
        return $place;
    }

    // ลบข้อมูลสถานที่ท่องเที่ยว
    public static function deletePlace($id)
    {
        $place = self::findOrFail($id);
        return $place->delete();
    }
}
