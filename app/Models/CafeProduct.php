<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CafeProduct extends Model
{
    use HasFactory;
    protected $table ='cafeproducts';
    protected $fillable = [
        'cafecate_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'tax',
        'qty',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    public function cafecategory(){
        return $this->belongsTo(CafeCategory::class,'cafecate_id','id');
    }
}


