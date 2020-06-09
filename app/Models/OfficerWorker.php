<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficerWorker extends Model
{
    protected $guarded=[];

    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }
    public function category()
    {
        return $this->belongsTo(IdCardCategory::class,'id_card_category_id');
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
