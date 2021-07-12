<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advimage extends Model
{
    use HasFactory;
    protected $fillable = [ 'advertisement_id','title'];
}
