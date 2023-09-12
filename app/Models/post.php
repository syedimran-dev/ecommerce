<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'category_id', 'user_id', 'price' ];



    public function category(){
        return $this->belongsTo(Category::class);
    }
}
