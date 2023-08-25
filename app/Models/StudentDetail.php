<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class StudentDetail extends Model
{
    use HasApiTokens, HasFactory;
   
    protected $fillable = [
        'student_id',
        'subject',
        'marks',
        'grade',
    ];
 

    
}
