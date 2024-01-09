<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $table = 'books';
    protected $fillable = [
        'id',
        'book_name',
        'release_date',
        'actor',
        'image_Path',
        
    ];
    public $timestamps = true;
}
