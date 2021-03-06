<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends ExistModel
{
    protected $fillable = ['author_id', 'new_header', 'new_lead', 'new_content', 'deleted'];

    public function new_images()
    {
        return $this->hasMany(NewImages::class);
    }
}
