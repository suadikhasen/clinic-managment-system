<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Phermacy as Authenticatable;
class Phermacy extends Authenticatable
{
    public $table='Phermacy';
    protected $keyType='char';
    public $incrementing=false;
    protected $primaryKey='username';
    protected $hidden=[
    'username','password','remember_token'
    ];

    protected $fillable=[
    'full_name','username','email','password','age','sex','graduated_college_university','photo','graduated_area','Graduated_status'
    ];
}
