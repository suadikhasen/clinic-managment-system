<?php

namespace App\CommonModel;
use Illuminate\Database\Eloquent\Model;

class Daily_labratory extends Model
{
    protected $table="daily_labratory";
    protected $primaryKey="clinic_id";
    protected $keyType="string";
    protected $guarded=[];
}
