<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public $timestamps = true;

    public function posts() {
        return $this->hasMany( 'App\Models\Post', 'category_id' );
    }
}