<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'depot_id',
        'customer_name',
        'customer_phone',
        'notes',
        'price',
        'price_of_sale',
        'status',
        'qty',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function itemReturn()
    {
        return $this->hasMany(ItemReturn::class);
    }
    public function scopeAllowed($query){
        $user = session()->get('user');
        return $query->whereDepotId($user->depot_id);
    }
}
