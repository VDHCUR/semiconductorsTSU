<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends ExistModel
{
    protected $fillable = ['name', 'year', 'archived', 'deleted'];
}
