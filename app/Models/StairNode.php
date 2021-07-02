<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StairNode extends Model
{
    protected $table = 'stair_nodes';
    public $incrementing = false;
    protected $fillable = [
        'id', 'stair_id', 'node_id'
    ];

    public function stair()
    {
        return $this->belongsTo(Stair::class, 'stair_id');
    }

    public function node()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }
}
