<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationeryCategory extends Model
{
    use HasFactory;
    protected $table='stationerycategories';
    protected $fillable=[
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
