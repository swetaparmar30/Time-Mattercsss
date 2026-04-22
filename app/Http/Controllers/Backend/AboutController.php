<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Updatelog;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $mission_values = json_decode($about->mission_values);
        if (isset($about) && $about != '' && $about != null) {

            return view('about.index', compact('about', 'mission_values'));
        } else {
            return view('about.index');
        }

    }
    public function save(Request $request) {

        $id = $request->about_id;
        $input = [

            'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
            'meta_description' => isset($request->meta_description) ? $request->meta_description : null,
            'title' => isset($request->title) ? $request->title : null,
            'description' => isset($request->description) ? $request->description : null,
            'missiontitle' => isset($request->missiontitle) ? $request->missiontitle : null,
            'bannerimage' => isset($request->bannerimage) ? $request->bannerimage : null,
            'abt_mb_bannerimage' => isset($request->abt_mb_bannerimage) ? $request->abt_mb_bannerimage : null,
            'missiondescription' => isset($request->missiondescription) ? $request->missiondescription : null,
            'missionbutton' => isset($request->missionbutton) ? $request->missionbutton : null,
            'missionbuttonurl' => isset($request->missionbuttonurl) ? $request->missionbuttonurl : null,
            'teamtitle' => isset($request->teamtitle) ? $request->teamtitle : null,
            'teambackground' => isset($request->teambackground) ? $request->teambackground : null,
            'teamdescription' => isset($request->teamdescription) ? $request->teamdescription : null,
            'button1' => isset($request->button1) ? $request->button1 : null,
            'button1url' => isset($request->button1url) ? $request->button1url : null,
            'button2' => isset($request->button2) ? $request->button2 : null,
            'button2url' => isset($request->button2url) ? $request->button2url : null,
            'historytitle' => isset($request->historytitle) ? $request->historytitle : null,
            'historyimage' => isset($request->historyimage) ? $request->historyimage : null,
            'historysubtitle' => isset($request->historysubtitle) ? $request->historysubtitle : null,
            'historydescription' => isset($request->historydescription) ? $request->historydescription : null,
            'historybutton' => isset($request->historybutton) ? $request->historybutton : null,
            'historybuttonurl' => isset($request->historybuttonurl) ? $request->historybuttonurl : null,
            'our_history_title' => isset($request->our_history_title) ? $request->our_history_title : null,
            'our_history_desc' => isset($request->our_history_desc) ? $request->our_history_desc : null,
            'how_we_deliver_title' => isset($request->how_we_deliver_title) ? $request->how_we_deliver_title : null,
            'how_we_deliver_desc' => isset($request->how_we_deliver_desc) ? $request->how_we_deliver_desc : null,
            'hwd_img_note' => isset($request->hwd_img_note) ? $request->hwd_img_note : null,
            'hwd_subtitle_1' => isset($request->hwd_subtitle_1) ? $request->hwd_subtitle_1 : null,
            'hwd_note_1' => isset($request->hwd_note_1) ? $request->hwd_note_1 : null,
            'hwd_subtitle_2' => isset($request->hwd_subtitle_2) ? $request->hwd_subtitle_2 : null,
            'hwd_note_2' => isset($request->hwd_note_2) ? $request->hwd_note_2 : null,
            'hwd_subtitle_3' => isset($request->hwd_subtitle_3) ? $request->hwd_subtitle_3 : null,
            'hwd_note_3' => isset($request->hwd_note_3) ? $request->hwd_note_3 : null,
            'hwd_subtitle_4' => isset($request->hwd_subtitle_4) ? $request->hwd_subtitle_4 : null,
            'hwd_note_4' => isset($request->hwd_note_4) ? $request->hwd_note_4 : null,
            'cv_img_note' => isset($request->cv_img_note) ? $request->cv_img_note : null,
            'cv_subtitle_1' => isset($request->cv_subtitle_1) ? $request->cv_subtitle_1 : null,
            'cv_note_1' => isset($request->cv_note_1) ? $request->cv_note_1 : null,
            'cv_subtitle_2' => isset($request->cv_subtitle_2) ? $request->cv_subtitle_2 : null,
            'cv_note_2' => isset($request->cv_note_2) ? $request->cv_note_2 : null,
            'cv_subtitle_3' => isset($request->cv_subtitle_3) ? $request->cv_subtitle_3 : null,
            'cv_note_3' => isset($request->cv_note_3) ? $request->cv_note_3 : null,
            'cv_subtitle_4' => isset($request->cv_subtitle_4) ? $request->cv_subtitle_4 : null,
            'cv_note_4' => isset($request->cv_note_4) ? $request->cv_note_4 : null,
            'cv_subtitle_5' => isset($request->cv_subtitle_5) ? $request->cv_subtitle_5 : null,
            'cv_note_5' => isset($request->cv_note_5) ? $request->cv_note_5 : null,
            'el_title' => isset($request->el_title) ? $request->el_title : null,
            'os_subtitle_1' => isset($request->os_subtitle_1) ? $request->os_subtitle_1 : null,
            'os_note_1' => isset($request->os_note_1) ? $request->os_note_1 : null,
            'os_subtitle_2' => isset($request->os_subtitle_2) ? $request->os_subtitle_2 : null,
            'os_note_2' => isset($request->os_note_2) ? $request->os_note_2 : null,
            'os_subtitle_3' => isset($request->os_subtitle_3) ? $request->os_subtitle_3 : null,
            'os_note_3' => isset($request->os_note_3) ? $request->os_note_3 : null,
            'why_title' => isset($request->why_title) ? $request->why_title : null,
            'why_desc' => isset($request->why_desc) ? $request->why_desc : null,
            'why_button_name' => isset($request->why_button_name) ? $request->why_button_name : null,
            'why_button_url' => isset($request->why_button_url) ? $request->why_button_url : null,


        ];

        $mission_values = json_encode([
            'status' => 1,
            'mv_post_1' => isset($request->mv_post_1) ? $request->mv_post_1 : '',
            'mv_post_2' => isset($request->mv_post_2) ? $request->mv_post_2 : '',

            'mv_title_1' => isset($request->mv_title_1) ? $request->mv_title_1 : '',
            'mv_title_2' => isset($request->mv_title_2) ? $request->mv_title_2 : '',
            'mv_title_3' => isset($request->mv_title_3) ? $request->mv_title_3 : '',
            'mv_title_4' => isset($request->mv_title_4) ? $request->mv_title_4 : '',
            'mv_title_5' => isset($request->mv_title_5) ? $request->mv_title_5 : '',
            'mv_title_6' => isset($request->mv_title_6) ? $request->mv_title_6 : '',
            'mv_description_1' => isset($request->mv_description_1) ? $request->mv_description_1 : '',
            'mv_description_2' => isset($request->mv_description_2) ? $request->mv_description_2 : '',
            'mv_description_3' => isset($request->mv_description_3) ? $request->mv_description_3 : '',
            'mv_description_4' => isset($request->mv_description_4) ? $request->mv_description_4 : '',
            'mv_description_5' => isset($request->mv_description_5) ? $request->mv_description_5 : '',
            'mv_description_6' => isset($request->mv_description_6) ? $request->mv_description_6 : '',
            'mv_icon_1' => isset($request->mv_icon_1) ? $request->mv_icon_1 : '',
            'mv_icon_2' => isset($request->mv_icon_2) ? $request->mv_icon_2 : '',
            'mv_icon_3' => isset($request->mv_icon_3) ? $request->mv_icon_3 : '',
            'mv_icon_4' => isset($request->mv_icon_4) ? $request->mv_icon_4 : '',
            'mv_icon_5' => isset($request->mv_icon_5) ? $request->mv_icon_5 : '',
            'mv_icon_6' => isset($request->mv_icon_6) ? $request->mv_icon_6 : '',
        ]);

        $input['mission_values'] = isset($mission_values) ? $mission_values : '';

        if (isset($id) && $id != '') {
            $about = About::findOrFail($id);
            $edata = json_encode($about);

            if ($about) {
                $about->fill($input);
                $about->update();

                // Log the update
                Updatelog::create(['tablename' => 'abouts', 'table_primary_id' => $about->id, 'edit_log' => $edata]);

                return redirect()->route('about.index')->with('success', 'About Setting Updated Successfully.');
            } else {
                return redirect()->route('about.index')->with('error', 'About Setting Update Failed!');
            }
        } else {
            $about = new About();
            $about->fill($input);
            $about->save();

            return redirect()->route('about.index')->with('success', 'About Setting Created Successfully.');
        }
    }
}