<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Loadingdockdoor extends Model
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
        'title',
        'subtitle',
        'description',
        'c_s_button_name',
        'c_s_button_url',
        'bannerimage',
        'section2',
        'section3',
        'section4',
        'section5',
        'section6',
        'section7',
        
    ];

}
