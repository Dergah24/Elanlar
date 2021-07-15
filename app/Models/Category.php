<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id', 'image', 'slug', 'main'];
    protected $appends = ['parent_name'];

    /**
     * Get the user that owns the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // protected $appends = ['parent_name'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getParentNameAttribute()
    {
        return $this->parent()->value('title');
    }

}
