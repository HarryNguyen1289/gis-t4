<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stair extends Model
{
    protected $table = 'stairs';
    public $incrementing = true;
    protected $fillable = [
        'id', 'name', 'type'
    ];

    public function floor(){
        return $this->belongsTo(Floor::class, 'highest_floor_id');
    }
}
