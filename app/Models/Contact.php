<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\CreatedUpdatedBy;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable, CreatedUpdatedBy, LogsActivity;

   
    protected $fillable = [
        'name',
        'email',
        'message',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['name', 'email', 'message']);
        // Chain fluent methods for configuration options
    }

    
}
