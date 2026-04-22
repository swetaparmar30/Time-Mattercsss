<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Cviebrock\EloquentSluggable\Sluggable;

class TimeService extends Model
{
    use HasFactory, SoftDeletes, Userstamps, Sluggable;

    protected $table = 'timeservices';
    protected $userstamps = [
        'created_by' => 'created_by',
        'updated_by' => 'updated_by',
        'deleted_by' => 'deleted_by',
    ];

    protected $fillable = [
        'title',
        'name',
        'slug',
        'description',
        'section1_name',
        'section1_title',
        'section1_subtitle',
        'section1_description',
        'section1_image',
        'section1_button',
        'section1_url',

        'section2_name',
        'section2_title',
        'section2_description',
        'section2_title2',
        'section2_description2',

        'section2_image',
        'section3_name',
        'section3_title',
        'section3_description',
        'section3_image',
        'section4_name',
        'section4_title',
        'section4_description',
        'section4_subtitle1',
        'section4_subtitle2',
        'section4_subtitle3',
        'section4_subtitle4',
        'section4_subtitle5',
        'section4_subtitle6',
        'section4_note1',
        'section4_note2',
        'section4_note3',
        'section4_note4',
        'section4_note5',
        'section4_note6',

        'historysubtitle',
        'historydescription',
        'historyimage',
        'cv_subtitle_1',
        'cv_note_1',
        'cv_subtitle_2',
        'cv_note_2',
        'cv_subtitle_3',
        'cv_note_3',
        'cv_subtitle_4',
        'cv_note_4',
        'cv_subtitle_5',
        'cv_note_5',


        'section5_name',
        'section5_title',
        'section5_description',
        'section5_button',
        'section5_url',

        'expert_title',
        'expert_description',
        'expert_button_name',
        'expert_url',
        
        'status',
        'publish_status',

        'created_by',
        'updated_by',
        'deleted_by',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
