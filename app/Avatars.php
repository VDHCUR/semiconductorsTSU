<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatars extends ExistModel
{
    protected $fillable = ['persons_id', 'path', 'deleted'];
}
