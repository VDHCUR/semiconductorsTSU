<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coops extends ExistModel
{
    protected $fillable = ['name', 'place', 'link', 'global', 'deleted'];
}
