<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thesis extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'student_id', 'program', 'supervisor', 'abstract', 'submission_date', 'defense_date'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
