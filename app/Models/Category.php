<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'thumb',
        'desc'
    ];
    protected $hidden = [
        'deleted_at', 'created_by_id',
    ];
    protected static function booted()
    {
        static::creating(function ($cate) {
            $user = Auth::user();
            $cate->created_by_id = $user->id;
            $cate->created_by_name = $user->name;
        });
        static::updating(function ($cate) {
            $user = Auth::user();
            $cate->updated_by_id = $user->id;
            $cate->updated_by_name = $user->name;
        });
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by_id');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
