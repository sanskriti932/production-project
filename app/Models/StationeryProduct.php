<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationeryProduct extends Model
{
    use HasFactory;
    protected $table ='stationeryproducts';
    protected $fillable = [
        'stationerycate_id',
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
    public function stationerycategory(){
        return $this->belongsTo(StationeryCategory::class,'stationerycate_id','id');
    }
}
