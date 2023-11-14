<?php

namespace App\Models\Content;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $casts = ['image' => 'array'];

    protected $fillable = ['title', 'slug', 'summary', 'body', 'image', 'status', 'commentable', 'tags', 'published_at', 'author_id', 'category_id'];


    public function postCategory(){
        return $this->belongsTo(PostCategory::class, 'category_id');
        
    }


}
