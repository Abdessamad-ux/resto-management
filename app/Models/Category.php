<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_fr', 'name_en', 'name_nl', 'description', 'meta_title', 'image', 'is_visible'];
}