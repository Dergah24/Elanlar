<?php

namespace App\Models;

use App\Models\adv_image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisements extends Model
{
    use HasFactory;
        protected $fillable = [ 'title','category_id','desc',  'city', 'price','delivery', 'quality','status','slug','user_id','vip','premium'];
        protected $appends = ['categoryName','derss'];

       public  function category(){
           return $this->belongsTo(Category::class);
       }

    public  function images(){
        return $this->hasMany(adv_images::class);
    }

    public function getCategoryNameAttribute(){
        return $this->category()->value('title');
    }

    public function getDerssAttribute(){
        return $this->images()->get('title');
    }


}
