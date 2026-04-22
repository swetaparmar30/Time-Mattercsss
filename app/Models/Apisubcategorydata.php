<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Apisubcategorydata extends Model
{
    use HasFactory, SoftDeletes;
   
    public $table = 'apisubcategorydata';
    
    protected $fillable = [
        'menutype',
        'category',
        'category_json',
        'subcategory',
        'category_type',
        'order'
    ];

}
