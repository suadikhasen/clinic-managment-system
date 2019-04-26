<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Registerar as Authenticatable;

class registerar extends Authenticatable
{
    public $table='registerar';
    protected $guarded=['email','password','username'];

    protected $hidden=[
    'password','remember_token','username'
    ];

    public $primaryKey="username";
    public $incrementing=false;
    public $keyType='char';

}
