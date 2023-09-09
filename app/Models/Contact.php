<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\CreatedUpdatedBy;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use App\Models\User;
use Spatie\MediaLibrary\InteractsWithMedia;


class Contact extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, CreatedUpdatedBy, LogsActivity, InteractsWithMedia;

   
    protected $fillable = [
        'name',
        'pancard',
        'email',
        'message',
        'aadhar',
        'country_id',
        'state_id'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'email', 'message']);
        // Chain fluent methods for configuration options
    }

    public function User()
    {
        return $this->hasOne(User::class, 'id');
    }



    
}
