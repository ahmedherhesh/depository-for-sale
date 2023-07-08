<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cat_id',
        'sub_cat_id',
        'company_id',
        'depot_id',
        'title',
        'notes',
        'image',
        'price',
        'price_of_sale',
        'qty',
        'allowed_qty',
        'status',
        'deleted',
        'created_at'
    ];
    function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_cat_id');
    }
    function getImageAttribute($image)
    {
        return $this->attributes['image'] ? asset("uploads/images/$image") : null;
    }

    function setImageAttribute($image)
    {
        $image_name =  rand(1000, 9999) . time() . '.' . $image->extension();
        $image->move(public_path("uploads/images"), $image_name);
        $this->attributes['image'] = $image_name;
    }
    function scopeAllowed($query)
    {
        $user = session()->get('user');
        return $query->whereUserId($user->id)->orWhere('depot_id', $user->depot_id);
    }
    function scopeInStock($query)
    {
        return $query->where('qty', '>', 0);
    }
    function scopeEnabled($query)
    {
        return $query->whereDeleted(0);
    }
}
