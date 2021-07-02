<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    protected $table = 'lines';
    public $incrementing = false;
    protected $fillable = [
        'id', 'first_node', 'second_node', 'distance'
    ];
}
