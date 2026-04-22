<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Apibannerdata extends Model
{
    use HasFactory, SoftDeletes;
   
    public $table = 'apibannerdata';
    
    protected $fillable = [
        'banner_id',
        'banner_title',
        'banner_image',
        'banner_subtitle',
        'banner_description',
        'category',
        'link_category',
        'link_sub_category',
        'link_product',
        'parent_cat_slug',
    ];

}
