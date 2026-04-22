<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Hollowmetaldoors extends Model
{
    use HasFactory, SoftDeletes;
    use Userstamps;
    public $timestamps = true;
    protected $userstamps = [
       'created_by' => 'created_by', 
       'updated_by' => 'updated_by',
       'deleted_by' => 'deleted_by',
    ];

    protected $fillable = [
        'meta_title',
        'meta_keyword',
        'meta_description',
        'bannertitle',
        'bannersubtitle',
        'bannerdescription',
        'hm_d_button_name',
        'hm_d_button_url',
        'hollowmetal_bannerimage',
        'hm_d_section2',
        'hm_d_section3',
        'hm_d_section4',
        'hm_d_section5',
        'hm_d_section6',
        'hm_d_section7',
        'hm_d_section8',
        'hm_d_section9',
        'hm_d_section10',
        
    ];

}
