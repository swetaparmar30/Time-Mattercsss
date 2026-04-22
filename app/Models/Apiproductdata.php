<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Apiproductdata extends Model
{
    use HasFactory, SoftDeletes;
   
    public $table = 'apiproductdata';
    
    protected $fillable = [
        'menutype',
        'category',
        'product',
        'product_json',
        'order'
    ];

}
