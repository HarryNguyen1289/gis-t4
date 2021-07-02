<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'nodes';
    public $incrementing = false;
    protected $fillable = [
        'id', 'coordinate_x', 'coordinate_y', 'floor_id'
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'id', 'node_id');
    }
}
