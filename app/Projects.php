<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Persons;

class Projects extends ExistModel
{
    protected $fillable = ['director_id', 'codename', 'name', 'deadline', 'coop', 'archived', 'deleted'];

    public function director()
    {
        return $this->belongsTo(Persons::class, 'director_id');
    }
}
