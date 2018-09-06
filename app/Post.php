<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {

    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id','featured_image', 'slug'
    ];

    protected $dates = ['deleted_at'];

    public function category() {
        return belongsTo('App\Category');
    }

    public function getFeaturedImageAttribute($featured_image) {
        return asset($featured_image);
    }
}