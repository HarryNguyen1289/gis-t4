<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    public $incrementing = false;
    protected $fillable = [
        'id', 'name', 'type', 'node_id'
    ];

    public function node()
    {
        return $this->hasOne(Node::class, 'node_id');
    }
}
