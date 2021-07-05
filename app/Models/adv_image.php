<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adv_image extends Model
{
    use HasFactory;
    protected $fillable = [ 'advertisement_id','title'];
}
