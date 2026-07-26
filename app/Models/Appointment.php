<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'date', 'time', 'name', 'email', 'phone', 'company', 'message', 'contact_channel', 'status'
    ];
}
