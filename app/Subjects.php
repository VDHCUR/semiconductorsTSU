<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $fillable = ['name', 'profiles_id', 'teacher_id', 'deleted'];

    public function teacher()
    {
        return $this->belongsTo(Persons::class)->where('deleted', "=", 0);
    }
}
