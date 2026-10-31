<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Model;
use App\Models\Events\Team;

class Event extends Model
{
    protected $guarded = [];
    protected $table = 'events';
    protected $casts = ['from' => 'datetime', 'to' => 'datetime'];

    public function Teams()
    {
        return $this->hasMany(Team::class, 'events_id', 'id');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
