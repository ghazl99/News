<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'type',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    public $timestamps = true;

    public function posts() {
        return $this->belongsToMany( 'App\Models\Post', 'tag__news' );
    }
}