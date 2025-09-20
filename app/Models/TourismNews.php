<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EventDate;

class TourismNews extends Model
{
    protected $table = 'tourism_news';
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];

    // ความสัมพันธ์กับตาราง event_dates
    public function eventDates()
    {
        return $this->hasMany(EventDate::class, 'tourism_news_id');
    }

    // เพิ่มข้อมูลข่าวการท่องเที่ยว
    public static function addNews($data)
    {
        return self::create($data);
    }

    // แก้ไขข้อมูลข่าวการท่องเที่ยว
    public static function updateNews($id, $data)
    {
        $news = self::findOrFail($id);
        $news->update($data);
        return $news;
    }

    // ลบข้อมูลข่าวการท่องเที่ยว
    public static function deleteNews($id)
    {
        $news = self::findOrFail($id);
        return $news->delete();
    }
}
