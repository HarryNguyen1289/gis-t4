<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public $incrementing = false;
    protected $fillable = [
        'id', 'name', 'type', 'coordinate_x', 'coordinate_y', 'floor_id'
    ];

    public function floor(){
        return $this->belongsTo(Floor::class, 'floor_id');
    }
}
