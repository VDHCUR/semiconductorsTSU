<?php

namespace App;

use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\Model;

class Persons extends ExistModel
{
    protected $fillable = [
        'user_id','surname', 'name', 'patronymic', 'phone', 'degree', 'position', 'link', 'deleted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return $this->hasMany(Avatars::class);
    }

    public function docs()
    {
        return $this->hasMany(PersonDocs::class);
    }
}
