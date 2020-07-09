<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends ExistModel
{
    protected $fillable = ['name', 'stage', 'deleted'];

    public function subjects()
    {
        return $this->hasMany(Subjects::class);
    }
}
