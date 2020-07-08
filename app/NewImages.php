<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class NewImages extends Model
{
    protected $fillable = ['news_id', 'path', 'deleted'];

    public function news()
    {
        $this->belongsTo(News::class);
    }
}
