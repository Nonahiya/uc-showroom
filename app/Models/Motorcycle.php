<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $table = 'motorcycles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'fuel_capacity', 
        'trunk_size'
    ];

    // Relationship with Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
