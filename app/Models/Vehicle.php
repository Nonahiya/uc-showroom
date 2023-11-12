<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'model', 
        'year', 
        'passenger_quantity', 
        'manufacturer',
        'price'
    ];

    // Relationship with Car
    public function car()
    {
        return $this->hasOne(Car::class);
    }

    // Relationship with Truck
    public function truck()
    {
         return $this->hasOne(Truck::class);
    }

    // Relationship with Motorcycle
    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class);
    }

    // Relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Check if vehicle is Car
    public function isCar()
    {
        return $this->car()->exists();
    }

    // Check if vehicle is Truck
    public function isTruck()
    {
        return $this->truck()->exists();
    }

    // Check if vehicle is Motorcycle
    public function isMotorcycle()
    {
        return $this->motorcycle()->exists();
    }
}
