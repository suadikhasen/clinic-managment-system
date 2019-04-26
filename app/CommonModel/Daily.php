<?php

namespace App\CommonModel;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $table='daily_phermacy_labratory_room';
    protected $primaryKey='clinic_id';
    protected $keyType='string';
    protected $guarded=[];
    
}
