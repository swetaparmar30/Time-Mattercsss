<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class LocationPageSetting extends Model
{
    use SoftDeletes ,Sluggable;

    public $timestamps = true;

    public $table = 'location_settings';

    protected $fillable = [
        'location',
        'slug',
        'status',
        'type',
        'banner_sec',
        'system_setting_sec',
        'services_sec',
        'service_heading_section',
        'garage_door',
        'quote_sec',
        'residential_sec',
        'gallery_sec',
        'areas_sec',
        'faq_sec',
        'blog_sec',
        'why_choose_sec',
        'calltoaction',
        'design_sec',
        'newgarage',
        'testimonial',
        'clientlogo',
        'meta_tags_sec',
        'form_sec',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $userstamps = [
        'created_by' => 'created_by',
        'updated_by' => 'updated_by',
        'deleted_by' => 'deleted_by',
    ];


     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'location', // 🔹 slug generated from location
            ],
        ];
    }
}
