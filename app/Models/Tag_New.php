<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag_New extends Model {
    use HasFactory;
    protected $table = 'tag__news';
    protected $fillable = [
        'post_id',
        'tag_id'

    ];
    public $timestamps = \false;
}