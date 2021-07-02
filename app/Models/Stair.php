<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stair extends Model
{
    protected $table = 'stairs';
    public $incrementing = false;
    protected $fillable = [
        'id', 'name', 'type', 'coordinate_x', 'coordinate_y', 'highest_floor'
    ];

    public function floor(){
        return $this->belongsTo(Floor::class, 'highest_floor');
    }
}
