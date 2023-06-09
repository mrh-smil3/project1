<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'tb_post';
    protected $primaryKey = 'id';
    protected $fillable = ['post_title', 'description', 'image'];
}
