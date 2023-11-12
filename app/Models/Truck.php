<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    use HasFactory;

    protected $table = 'trucks';
    protected $primaryKey = 'id';
    protected $fillable = [
        'vehicle_id',
        'wheel_quantity', 
        'cargo_area'
    ];

    // Relationship with Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
