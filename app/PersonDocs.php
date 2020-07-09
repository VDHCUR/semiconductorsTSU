<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonDocs extends ExistModel
{
    protected $fillable = ['persons_id', 'name', 'path', 'deleted'];
}
