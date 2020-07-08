<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AspirantInfos extends Model
{
    protected $fillable = ['author_id', 'info'];

    public function docs()
    {
        return $this->hasMany(AspirantDocs::class)->where('deleted', "=", 0);
    }
}
