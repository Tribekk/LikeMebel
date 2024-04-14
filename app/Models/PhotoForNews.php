<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoForNews extends Model
{
    use HasFactory;
    protected $fillable=[
        'news_id',
        'photo'
    ];

    public function photo(){
        return $this->belongsTo( News::class);
    }
    public function news()
    {
        return  $this->belongsTo(News::class);
    }
}
