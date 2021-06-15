<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Episode extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = ['title', 'air_date'];

    public function characters()
    {
        return $this->belongsToMany('App\Models\Character', 'character_episode');
    }
}
