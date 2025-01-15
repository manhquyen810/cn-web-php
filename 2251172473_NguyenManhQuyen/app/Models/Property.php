<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id', 
        'address', 
        'city', 
        'type',
        'price',
        'status'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
