<?php

namespace App\CommonModel;

use Illuminate\Database\Eloquent\Model;

class Daily_Phermacy extends Model
{
    protected $table="daily_phermacy";
    protected $primaryKey="clinic_id";
    protected $keyType="string";
    protected $guarded=[];

    
}
