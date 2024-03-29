<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';
    public $incrementing = false;
    protected $fillable = [
        'id', 'name', 'height', 'coordinates'
    ];

}
