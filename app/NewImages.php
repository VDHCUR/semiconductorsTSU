<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class NewImages extends ExistModel
{
    protected $fillable = ['news_id', 'path', 'deleted'];

    public function news()
    {
        $this->belongsTo(News::class);
    }
}
