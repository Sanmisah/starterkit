<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\CreatedUpdatedBy;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\StudentDetail;
use Carbon\Carbon;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable, CreatedUpdatedBy, LogsActivity;

   
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'gender',
        'dob'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'email', 'mobile', 'address', 'gender', 'dob']);
        // Chain fluent methods for configuration options
    }

    public function StudentDetails()
    {
        return $this->hasMany(StudentDetail::class);
    }

    protected static function booted () {
        static::deleting(function(Student $student) { 
             $student->StudentDetails()->delete();
        });
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::createFromFormat('d/m/Y', $value);
    }

    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }


    
}
