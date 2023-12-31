<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animeblog extends Model
{
    use HasFactory;
    
    protected $table = 'animes';
    
    protected $fillable = ['title','description','image_path'];
}
