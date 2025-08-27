<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    protected $table = 'event_dates'; // ชื่อตาราง

    protected $fillable = [
        'tourism_news_id',
        'event_name',
        'start_date',
        'end_date',
        'location',
        'description'
    ];

    // ความสัมพันธ์กับ TourismNews
    public function tourismNews()
    {
        return $this->belongsTo(TourismNews::class, 'tourism_news_id');
    }
}
