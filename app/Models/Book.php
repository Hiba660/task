<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [

        'user_id',
        'title',
        'description',
        'cover_image',
        'isbn',
        'published_date',
        'price',
        'number_of_pages',

    ];
}
