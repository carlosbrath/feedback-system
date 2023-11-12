<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class Request extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class,'id');
    }
}
