<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name', 
        'address', 
        'telephone_number', 
    ];

    // Relationship with Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
