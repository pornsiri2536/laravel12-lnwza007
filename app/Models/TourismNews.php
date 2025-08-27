<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EventDate; // ✅ เพิ่มบรรทัดนี้เพื่อ import EventDate model

class TourismNews extends Model
{
    // ถ้ามีการใช้ fillable กำหนดคอลัมน์ที่สามารถกรอกได้
    protected $fillable = [
        'title',
        'description',
        'image',
        'published_at',
    ];

    // ความสัมพันธ์กับตาราง event_dates
    public function eventDates()
    {
        return $this->hasMany(EventDate::class, 'tourism_news_id');
        $table->string('image')->nullable();
 $news = TourismNews::latest()->get();
    return view('tourism.index', compact('news'));
    }
}
