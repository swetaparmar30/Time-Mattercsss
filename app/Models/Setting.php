<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class Setting extends Model
{
    use HasFactory;
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
        'contact_no',
        'contact_no2',
        'contact_no3',
        'contact_no4',
        'contact_no5',
        'email',
        'email2',
        'email3',
        'email4',
        'location',
        'location2',
        'location3',
        'location4',
        'content',
        'site_title',
        'site_logo',
        'footer_logo',
        'site_favicon',
        'facebook_url',
        'youtube_url',
        'insta_url',
        'twitter_url',
        'linked_url',
        'pinterest_url',
        'google_url',
        'dover_location_url',
        'newport_location_url',
        'copyright',
        'monday',
        'tuesday',
        'wedsday',
        'thursday',
        'friday',
        'sat_sun',
        'map_link',
        'map_link2',
        'map_link3',
        'map_link4',
        'banner_title',
        'banner_description',
        'banner_image',
        'reach_out_title',
        'reach_out_description',
        'office_hours'
    ];


}
