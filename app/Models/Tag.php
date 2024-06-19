<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', "slug"];

    protected $hidden = ['created_by_id'];

    protected static function booted()
    {
        static::creating(function (Tag $tag) {
            $tag->created_by_id = Auth::id();
        });
    }
    public function createBy()
    {
        return $this->belongsTo(Admin::class, 'created_by_id');
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by_id');
    }
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags', 'tag_id', 'article_id');
    }
}
