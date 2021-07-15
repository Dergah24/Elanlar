<?php

namespace App\Models;

use App\Models\advimage;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'desc', 'city_id', 'price', 'delivery', 'quality', 'status', 'slug', 'user_id', 'vip', 'premium', 'premium_end', 'vip_end', 'adv_end'];
    protected $appends = ['categoryName'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(advimage::class, 'advertisement_id');
    }

    public function getCategoryNameAttribute()
    {
        return $this->category()->value('title');
    }

}
