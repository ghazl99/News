<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'category_id',
        'title',
        'paragraph'

    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public $timestamps = true;

    public function category() {
        return $this->belongsTo( 'App\Models\Category', 'category_id' );
    }

    public function tags() {
        return $this->belongsToMany( 'App\Models\Tag', 'tag__news' );
    }
}