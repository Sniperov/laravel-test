<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Quote extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = ['quote', 'character_id', 'episode_id'];
    protected $hidden = ['character_id', 'episode_id'];

    public function character()
    {
        return $this->belongsTo('App\Models\Character', 'character_id');
    }
}
