<?php

namespace App;

use App\Scopes\ExistScope;
use Illuminate\Database\Eloquent\Model;

class ExistModel extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ExistScope);
    }
}
