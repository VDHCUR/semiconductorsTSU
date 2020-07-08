<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coops extends Model
{
    protected $fillable = ['name', 'place', 'link', 'global', 'deleted'];
}
