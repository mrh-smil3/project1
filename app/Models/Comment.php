<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'tb_project1';
    protected $primaryKey = 'post_id';
    protected $fillable = ['komentar', 'contact', 'email'];
}
