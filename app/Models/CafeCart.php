<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CafeCart extends Model
{
    use HasFactory;
    protected $table ='cafecarts';
    protected $fillable=[
        'user_id',
        'cafeprod_id',
        'cafeprod_qty'

    ];
    public function cafeproducts(){
        return $this->belongsTo(CafeProduct::class,'cafeprod_id','id');
    }
}
