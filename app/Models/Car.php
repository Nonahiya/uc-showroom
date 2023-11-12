<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'fuel_type', 
        'trunk_area'
    ];

    // Relationship with Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
