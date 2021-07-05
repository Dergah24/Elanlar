<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    use HasFactory;
        protected $fillable = [ 'title','category_id','desc', 'marka', 'city', 'price','delivery', 'quality','status','slug','user_id'];
        protected $appends = ['categoryName','derss'];

       public  function category(){
           return $this->belongsTo(Category::class);
       }

    public  function images(){
        return $this->hasMany(adverImages::class);
    }

    public function getCategoryNameAttribute(){
        return $this->category()->value('title');
    }

    public function getDerssAttribute(){
        return $this->images()->get('title');
    }


}
