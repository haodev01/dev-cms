<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', "slug", 'desc', 'thumb', 'content', 'status',];
    protected static function booted()
    {
        static::creating(function (Article $article) {
            $article->created_by_id = Auth::id();
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Category::class, 'article_tag', 'article_id', 'tag_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by_id');
    }
}
