<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Character extends Model
{
    use HasFactory, CrudTrait;

    protected $fillable = ['name', 'birthday', 'occupations', 'img', 'nickname', 'portrayed'];

    public function quotes()
    {
        return $this->hasMany('App\Models\Quote');
    }
}
