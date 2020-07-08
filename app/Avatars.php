<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatars extends Model
{
    protected $fillable = ['persons_id', 'path', 'deleted'];
}
