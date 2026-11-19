<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Eloquent untuk satu post yang disimpan di tabel posts.
 */
class Post extends Model
{
    // Kolom yang boleh diisi sekaligus melalui Post::create() atau update().
    protected $fillable = [
        'title',
        'content',
    ];
}