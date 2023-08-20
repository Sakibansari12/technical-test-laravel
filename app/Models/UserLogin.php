<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLogin extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected $table = 'user_logins';

    protected $fillable = [
          'name',
          'email',
          'phone',
          'password',
    ];
}
