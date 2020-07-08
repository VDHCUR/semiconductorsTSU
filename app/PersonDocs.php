<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonDocs extends Model
{
    protected $fillable = ['persons_id', 'name', 'path', 'deleted'];
}
