<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // Sử dụng trait HasFactory

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'description',
        'difficulty',
        'price',
        'start_date',
    ];
}
