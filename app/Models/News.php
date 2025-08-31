<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'link',
    ];

    // ความสัมพันธ์กับตาราง event_dates
    public function eventDates()
    {
        return $this->hasMany(EventDate::class, 'news_id');
    }
}
