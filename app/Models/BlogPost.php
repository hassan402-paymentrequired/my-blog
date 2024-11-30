<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Exceptions\HttpResponseException;
use Str;

class BlogPost extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'content',
        'tag',
        'image',
        "author"
    ];

    protected static function booted()
    {
        static::creating(function ($blogPost) {
            $blogPost->slug = Str::slug($blogPost->title, '-');
            $blogPost->post_id = str_replace('-', '', (string) Str::uuid());
        });

        static::updating(function ($blogPost) {
            $blogPost->slug = Str::slug($blogPost->title, '-');
        });
    }


public function getRouteKeyName()
{
    return 'post_id';
}

public function getRouteKey()
{
    return Str::slug($this->title) . '-' . $this->getAttribute($this->getRouteKeyName());
}
    public function resolveRouteBinding($value, $field = null)
{
    $id = last(explode('-', $value));
    $model = parent::resolveRouteBinding($id, $field);
    if(!$model || $model->getRouteKey() === $value)
    {
        return $model;
    }

    throw new HttpResponseException(
        redirect()->route('show.blog.post', $model)
    );
}
}
