<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Illuminate\Support\Carbon;

class About extends Model
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
        'description',
        'bannerimage',
        'abt_mb_bannerimage',
        'mission_values',
        'missiontitle',
        'missiondescription',
        'missionbutton',
        'missionbuttonurl',
        'teamtitle',
        'teamdescription',
        'teambackground',
        'button1',
        'button1url',
        'button2',
        'button2url',
        'historytitle',
        'historysubtitle',
        'historydescription',
        'historyimage',
        'historybutton',
        'historybuttonurl',
        'our_history_title',
        'our_history_desc',
        'how_we_deliver_title',
        'how_we_deliver_desc',
        'hwd_img_note',
        'hwd_subtitle_1',
        'hwd_note_1',
        'hwd_subtitle_2',
        'hwd_note_2',
        'hwd_subtitle_3',
        'hwd_note_3',
        'hwd_subtitle_4',
        'hwd_note_4',
        'cv_img_note',
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
        'el_title',

        'os_subtitle_1',
        'os_note_1',
        'os_subtitle_2',
        'os_note_2',
        'os_subtitle_3',
        'os_note_3',

        'why_title',
        'why_desc',
        'why_button_name',
        'why_button_url',
    ];

}
