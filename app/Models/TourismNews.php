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
}
