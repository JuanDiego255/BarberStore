<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function blogCategoryDetails()
    {
        return $this->hasOne(BlogCategoryDetails::class, 'category_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }

}
