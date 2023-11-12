<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id', 
        'vehicle_id', 
        'order_detail_quantity'
    ];

    // Relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Relationship with Vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
