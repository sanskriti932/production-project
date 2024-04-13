<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationeryCart extends Model
{
    use HasFactory;
    protected $table ='stationerycarts';
    protected $fillable=[
        'user_id',
        'stationeryprod_id',
        'stationeryprod_qty'

    ];
    public function stationeryproducts(){
        return $this->belongsTo(StationeryProduct::class,'stationeryprod_id','id');
    }
}
