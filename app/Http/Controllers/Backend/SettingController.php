<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\EmailSetting;
use App\Models\HomePageSetting;
use App\Models\LocationPageSetting;
use App\Models\CommentSetting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use App\Models\Updatelog;
use DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        if (isset($setting) && $setting != '' && $setting != null) {
            return view('settings.index', compact('setting'));
        } else {
            return view('settings.index');
        }
    }
    public function save(Request $request)
    {

        $id = $request->setting_id;
        $input = [

            'meta_title' => isset($request->meta_title) ? $request->meta_title : null,
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : null,
            'meta_description' => isset($request->meta_description) ? $request->meta_description : null,
            'contact_no' => isset($request->contact_no) ? $request->contact_no : null,
            'contact_no2' => isset($request->contact_no2) ? $request->contact_no2 : null,
            'contact_no3' => isset($request->contact_no3) ? $request->contact_no3 : null,
            'contact_no4' => isset($request->contact_no4) ? $request->contact_no4 : null,
            'contact_no5' => isset($request->contact_no5) ? $request->contact_no5 : null,
            'email' => isset($request->email) ? $request->email : null,
            'email2' => isset($request->email2) ? $request->email2 : null,
            'email3' => isset($request->email3) ? $request->email3 : null,
            'email4' => isset($request->email4) ? $request->email4 : null,
            'location' => isset($request->location) ? $request->location : null,
            'location2' => isset($request->location2) ? $request->location2 : null,
            'location3' => isset($request->location3) ? $request->location3 : null,
            'location4' => isset($request->location4) ? $request->location4 : null,
            'map_link' => isset($request->map_link) ? $request->map_link : null,
            'map_link2' => isset($request->map_link2) ? $request->map_link2 : null,
            'map_link3' => isset($request->map_link3) ? $request->map_link3 : null,
            'map_link4' => isset($request->map_link4) ? $request->map_link4 : null,
            'content' => isset($request->content) ? $request->content : null,
            'site_title' => isset($request->title) ? $request->title : null,
            'site_logo' => isset($request->site_logo) ? $request->site_logo : null,
            'footer_logo' => isset($request->footer_logo) ? $request->footer_logo : null,
            'site_favicon' => isset($request->site_favicon) ? $request->site_favicon : null,
            'facebook_url' => isset($request->facebook_url) ? $request->facebook_url : null,
            'insta_url' => isset($request->insta_url) ? $request->insta_url : null,
            'youtube_url' => isset($request->youtube_url) ? $request->youtube_url : null,
            'google_url' => isset($request->google_url) ? $request->google_url : null,
            'twitter_url' => isset($request->twitter_url) ? $request->twitter_url : null,
            'linked_url' => isset($request->linked_url) ? $request->linked_url : null,
            'pinterest_url' => isset($request->pinterest_url) ? $request->pinterest_url : null,
            'dover_location_url' => isset($request->dover_location_url) ? $request->dover_location_url : null,
            'newport_location_url' => isset($request->newport_location_url) ? $request->newport_location_url : null,
            'copyright' => isset($request->copyright) ? $request->copyright : null,
            'banner_title' => isset($request->banner_title) ? $request->banner_title : null,
            'banner_description' => isset($request->banner_description) ? $request->banner_description : null,
            'banner_image' => isset($request->banner_image) ? $request->banner_image : null,
            'reach_out_title' => isset($request->reach_out_title) ? $request->reach_out_title : null,
            'office_hours' => isset($request->office_hours) ? $request->office_hours : null,
            'reach_out_description' => isset($request->reach_out_description) ? $request->reach_out_description : null,
        ];

        if ($request->monday_choose == 'open') {
            $monday = json_encode([
                'status' => 1,
                'from' => isset($request->monday_form) ? $request->monday_form : '',
                'to' => isset($request->monday_to) ? $request->monday_to : '',
                'from2' => isset($request->monday_form2) ? $request->monday_form2 : '',
                'to2' => isset($request->monday_to2) ? $request->monday_to2 : '',
            ]);
        }
        if ($request->tuesday_choose == 'open') {
            $tuesday = json_encode([
                'status' => 1,
                'from' => isset($request->tuesday_form) ? $request->tuesday_form : '',
                'to' => isset($request->tuesday_to) ? $request->tuesday_to : '',
                'from2' => isset($request->tuesday_form2) ? $request->tuesday_form2 : '',
                'to2' => isset($request->tuesday_to2) ? $request->tuesday_to2 : '',
            ]);
        }
        if ($request->wedsday_choose == 'open') {
            $wednesday = json_encode([
                'status' => 1,
                'from' => isset($request->wed_form) ? $request->wed_form : '',
                'to' => isset($request->wed_to) ? $request->wed_to : '',
                'from2' => isset($request->wed_form2) ? $request->wed_form2 : '',
                'to2' => isset($request->wed_to2) ? $request->wed_to2 : '',
            ]);
        }
        if ($request->thursday_choose == 'open') {
            $thursday = json_encode([
                'status' => 1,
                'from' => isset($request->thur_form) ? $request->thur_form : '',
                'to' => isset($request->thur_to) ? $request->thur_to : '',
                'from2' => isset($request->thur_form2) ? $request->thur_form2 : '',
                'to2' => isset($request->thur_to2) ? $request->thur_to2 : '',
            ]);
        }
        if ($request->friday_choose == 'open') {
            $friday = json_encode([
                'status' => 1,
                'from' => isset($request->friday_form) ? $request->friday_form : '',
                'to' => isset($request->friday_to) ? $request->friday_to : '',
                'from2' => isset($request->friday_form2) ? $request->friday_form2 : '',
                'to2' => isset($request->friday_to2) ? $request->friday_to2 : '',
            ]);
        }
        if ($request->sat_sun_choose == 'open') {
            $sat_sun = json_encode([
                'status' => 1,
                'from' => isset($request->sat_sun_form) ? $request->sat_sun_form : '',
                'to' => isset($request->sat_sun_to) ? $request->sat_sun_to : '',
                'from2' => isset($request->sat_sun_form2) ? $request->sat_sun_form2 : '',
                'to2' => isset($request->sat_sun_to2) ? $request->sat_sun_to2 : '',
            ]);
        }

        if ($request->sun_choose == 'open') {
            $sunday = json_encode([
                'status' => 1,
                'from' => isset($request->sun_form) ? $request->sun_form : '',
                'to' => isset($request->sun_to) ? $request->sun_to : '',
                'from2' => isset($request->sun_form2) ? $request->sun_form2 : '',
                'to2' => isset($request->sun_to2) ? $request->sun_to2 : '',
            ]);
        }

        $input['monday'] = isset($monday) ? $monday : 'closed';
        $input['tuesday'] = isset($tuesday) ? $tuesday : 'closed';
        $input['wedsday'] = isset($wednesday) ? $wednesday : 'closed';
        $input['thursday'] = isset($thursday) ? $thursday : 'closed';
        $input['friday'] = isset($friday) ? $friday : 'closed';
        $input['sat_sun'] = isset($sat_sun) ? $sat_sun : 'closed';
        $input['sunday'] = isset($sunday) ? $sunday : 'closed';

        // if (isset($id) && $id != '') {
        //     $setting = Setting::findOrFail($id);
        //     $edata = json_encode($setting);

        //     if ($setting) {

        //         $setting->fill($input);
        //         $setting->update();

        //         // Log the update
        //         Updatelog::create(['tablename' => 'general-setting', 'table_primary_id' => $setting->id, 'edit_log' => $edata]);

        //         return redirect()->route('setting.index')->with('success', 'Contact Setting Updated Successfully.');
        //     } else {
        //         return redirect()->route('setting.index')->with('error', 'Contact Setting Update Failed!');
        //     }
        // } else {
        //     $setting = new Setting();
        //     $setting->fill($input);
        //     $setting->save();

        //     return redirect()->route('setting.index')->with('success', 'Contact Setting Created Successfully.');
        // }

        $setting = Setting::first();

        if ($setting) {
            $edata = json_encode($setting);
            $setting->update($input);

            Updatelog::create([
                'tablename' => 'general-setting',
                'table_primary_id' => $setting->id,
                'edit_log' => $edata
            ]);

            return redirect()->route('setting.index')
                ->with('success', 'Contact Setting Updated Successfully.');
        } else {
            Setting::create($input);

            return redirect()->route('setting.index')
                ->with('success', 'Contact Setting Created Successfully.');
        }
    }

    public function email_setting()
    {
        $email = EmailSetting::first();
        if (isset($email) && $email != '' && $email != null) {
            return view('settings.email_index', compact('email'));
        } else {
            return view('settings.email_index');
        }
    }
    public function email_setting_save(Request $request)
    {
        $id = $request->emailsetting_id;
        $data['transport'] = isset($request->mail_driver) ? $request->mail_driver : null;
        $data['host'] = isset($request->mail_host) ? $request->mail_host : null;
        $data['port'] = isset($request->mail_port) ? $request->mail_port : null;
        $data['encryption'] = isset($request->mail_encryption) ? $request->mail_encryption : null;
        $data['username'] = isset($request->mail_username) ? $request->mail_username : null;
        $data['password'] = isset($request->mail_password) ? $request->mail_password : null;
        $data['from_address'] = isset($request->mail_from) ? $request->mail_from : null;
        $data['from_name'] = isset($request->mail_from_name) ? $request->mail_from_name : null;

        if (isset($id) && $id != '') {
            $email_seting = EmailSetting::findOrFail($id);
            $edata = json_encode($email_seting);
            if (isset($email_seting)) {
                $save = EmailSetting::where('id', $id)->update($data);
                $edt = Updatelog::create(['tablename' => 'email-setting', 'table_primary_id' => $email_seting->id, 'edit_log' => $edata]);
                $email_seting->update();
                return redirect()->route('setting.email.index')->with('success', 'E-Mail Setting Updated Successfully.');
            } else {
                return redirect()->route('setting.email.index')->with('success', 'E-Mail Setting Update Failed!');
            }
        } else {
            $data['created_at'] = Carbon::now();
            $save = EmailSetting::insert($data);
            return redirect()->route('setting.email.index')->with('success', 'E-Mail Setting Saved Successfully.');
        }
    }

    public function homepage_setting_view()
    {
        $home = HomePageSetting::first();
        $banner = json_decode($home->banner_sec);
        $system_setting = json_decode($home->system_setting_sec);
        $value_highlights = json_decode($home->value_highlight_sec);
        $garage_door = json_decode($home->garage_door);
        $residential = json_decode($home->residential_sec);
        $quote = json_decode($home->quote_sec);
        $gallery = json_decode($home->gallery_sec);
        $areas = json_decode($home->areas_sec);
        $faq = json_decode($home->faq_sec);
        $why_choose = json_decode($home->why_choose_sec);
        $calltoaction = json_decode($home->calltoaction);
        $design = json_decode($home->design_sec);
        $newgarage = json_decode($home->newgarage);
        $testimonial = json_decode($home->testimonial);
        $clientlogo = json_decode($home->clientlogo);
        $form = json_decode($home->form_sec);
        $blog = json_decode($home->blog_sec);
        $service_head_sec = json_decode($home->service_heading_section);
        $services = json_decode($home->services_sec);

        return view('settings.homepagesetting', compact('home', 'banner', 'system_setting', 'garage_door', 'quote', 'residential', 'gallery', 'areas', 'faq', 'calltoaction', 'design', 'newgarage', 'testimonial', 'clientlogo', 'form', 'blog', 'why_choose', 'service_head_sec', 'services', 'value_highlights'));
    }
    public function homepage_setting_store(Request $request)
    {

        if (isset($request->banner_checked) && $request->banner_checked != '' && $request->banner_checked == 'on') {
            $banner = json_encode([
                'checked' => isset($request->banner_checked) && $request->banner_checked == 'on' ? 1 : 0,
                'banner_title' => isset($request->banner_title) ? $request->banner_title : '',
                'banner_subtitle' => isset($request->banner_subtitle) ? $request->banner_subtitle : '',
                'banner_description' => isset($request->banner_description) ? $request->banner_description : '',
                'banner_img' => isset($request->banner_img) ? $request->banner_img : '',
                'mobile_banner_img' => isset($request->mobile_banner_img) ? $request->mobile_banner_img : '',
                'banner_img_1100x480' => isset($request->banner_img_1100x480) ? $request->banner_img_1100x480 : '',
                'banner_formtitle' => isset($request->banner_formtitle) ? $request->banner_formtitle : '',
                'button_label' => isset($request->button_label) ? $request->button_label : '',
            ]);
        }
        if (isset($request->system_setting_checked) && $request->system_setting_checked != '' && $request->system_setting_checked == 'on') {
            $system_setting = json_encode([
                'checked' => isset($request->system_setting_checked) && $request->system_setting_checked == 'on' ? 1 : 0,
                'system_setting_title' => isset($request->system_setting_title) ? $request->system_setting_title : '',
                'system_sub_title' => isset($request->system_sub_title) ? $request->system_sub_title : '',
                'system_setting_description' => isset($request->system_setting_description) ? $request->system_setting_description : '',
                'system_img' => isset($request->system_img) ? $request->system_img : '',
                'system_img1' => isset($request->system_img1) ? $request->system_img1 : '',
                'system_img2' => isset($request->system_img2) ? $request->system_img2 : '',
                'system_img3' => isset($request->system_img3) ? $request->system_img3 : '',
                'system_img4' => isset($request->system_img4) ? $request->system_img4 : '',
                'title1' => isset($request->title1) ? $request->title1 : '',
                'title2' => isset($request->title2) ? $request->title2 : '',
                'title3' => isset($request->title3) ? $request->title3 : '',
                'title4' => isset($request->title4) ? $request->title4 : '',
                'note1' => isset($request->note1) ? $request->note1 : '',
                'note2' => isset($request->note2) ? $request->note2 : '',
                'note3' => isset($request->note3) ? $request->note3 : '',
                'note4' => isset($request->note4) ? $request->note4 : '',
                'btn_name1' => isset($request->btn_name1) ? $request->btn_name1 : '',
                'btn_name2' => isset($request->btn_name2) ? $request->btn_name2 : '',
                'btn_name3' => isset($request->btn_name3) ? $request->btn_name3 : '',
                'btn_name4' => isset($request->btn_name4) ? $request->btn_name4 : '',
                'btn_url1' => isset($request->btn_url1) ? $request->btn_url1 : '',
                'btn_url2' => isset($request->btn_url2) ? $request->btn_url2 : '',
                'btn_url3' => isset($request->btn_url3) ? $request->btn_url3 : '',
                'btn_url4' => isset($request->btn_url4) ? $request->btn_url4 : '',
            ]);
        }
        if (isset($request->value_highlights_checked) && $request->value_highlights_checked != '' && $request->value_highlights_checked == 'on') {
            $highlights = [];
            // Loop highlights
            if ($request->has('value_title')) {
                foreach ($request->value_title as $key => $title) {
                    $highlights[] = [
                        'title' => $title ?? '',
                        'content' => $request->value_content[$key] ?? '',
                    ];
                }
            }
            $value_highlights = json_encode([
                'checked' => 1,
                'section_title' => $request->value_section_title ?? '',
                'section_description' => $request->value_section_description ?? '',
                'items' => $highlights
            ]);
        } else {
            $value_highlights = json_encode([
                'checked' => 0,
                'section_title' => '',
                'section_description' => '',
                'items' => []
            ]);
        }

        if (isset($request->door_title_sec_checked) && $request->door_title_sec_checked != '' && $request->door_title_sec_checked == 'on') {
            $garage_door = json_encode([
                'checked' => isset($request->door_title_sec_checked) && $request->door_title_sec_checked == 'on' ? 1 : 0,
                'door_title' => isset($request->door_title) ? $request->door_title : '',
                'door_button_name' => isset($request->door_button_name) ? $request->door_button_name : '',
                'door_button_url' => isset($request->door_button_url) ? $request->door_button_url : '',
                'door_sub_title' => isset($request->door_sub_title) ? $request->door_sub_title : '',
                'garage_door_description' => isset($request->garage_door_description) ? $request->garage_door_description : '',
                'garage_img' => isset($request->garage_img) ? $request->garage_img : '',
            ]);
        }
        if (isset($request->testimonial_sec_checked) && $request->testimonial_sec_checked != '' && $request->testimonial_sec_checked == 'on') {
            $testimonial = json_encode([
                'checked' => isset($request->testimonial_sec_checked) && $request->testimonial_sec_checked == 'on' ? 1 : 0,
                'testimonial_title' => isset($request->testimonial_title) ? $request->testimonial_title : '',
                'testimonial_sub_title' => isset($request->testimonial_sub_title) ? $request->testimonial_sub_title : '',
            ]);

        }
        if (isset($request->clientlogo_sec_checked) && $request->clientlogo_sec_checked != '' && $request->clientlogo_sec_checked == 'on') {
            $clientlogo = json_encode([
                'checked' => isset($request->clientlogo_sec_checked) && $request->clientlogo_sec_checked == 'on' ? 1 : 0,
                'clientlogo_title' => isset($request->clientlogo_title) ? $request->clientlogo_title : '',
            ]);
        }
        if (isset($request->blog_sec_checked) && $request->blog_sec_checked != '' && $request->blog_sec_checked == 'on') {
            $blog = json_encode([
                'checked' => isset($request->blog_sec_checked) && $request->blog_sec_checked == 'on' ? 1 : 0,
                'blog_title' => isset($request->blog_title) ? $request->blog_title : '',
            ]);
        }
        if (isset($request->residential_checked) && $request->residential_checked != '' && $request->residential_checked == 'on') {
            $residential = json_encode([
                'checked' => isset($request->residential_checked) && $request->residential_checked == 'on' ? 1 : 0,
                'resi_title' => isset($request->resi_title) ? $request->resi_title : '',
                'resi_sub_title' => isset($request->resi_sub_title) ? $request->resi_sub_title : '',
                'resi_button_name' => isset($request->resi_button_name) ? $request->resi_button_name : '',
                'resi_button_url' => isset($request->resi_button_url) ? $request->resi_button_url : '',
                'resi_description' => isset($request->resi_description) ? $request->resi_description : '',
            ]);
        }

        if (isset($request->gallery_sec_checked) && $request->gallery_sec_checked != '' && $request->gallery_sec_checked == 'on') {
            $gallery = json_encode([
                'checked' => isset($request->gallery_sec_checked) && $request->gallery_sec_checked == 'on' ? 1 : 0,
                'gallery_title' => isset($request->gallery_title) ? $request->gallery_title : '',
                'gallery_sub_title' => isset($request->gallery_sub_title) ? $request->gallery_sub_title : '',
            ]);
        }

        if (isset($request->areas_checked) && $request->areas_checked != '' && $request->areas_checked == 'on') {
            $areas = json_encode([
                'checked' => isset($request->areas_checked) && $request->areas_checked == 'on' ? 1 : 0,
                'areas_title' => isset($request->areas_title) ? $request->areas_title : '',
                'areas_sub_title' => isset($request->areas_sub_title) ? $request->areas_sub_title : '',
                'areas_button_name' => isset($request->areas_button_name) ? $request->areas_button_name : '',
                'areas_button_url' => isset($request->areas_button_url) ? $request->areas_button_url : '',
                'areas_img' => isset($request->areas_img) ? $request->areas_img : '',
            ]);
        }
        if (isset($request->faq_sec_checked) && $request->faq_sec_checked != '' && $request->faq_sec_checked == 'on') {
            $faq = json_encode([
                'checked' => isset($request->faq_sec_checked) && $request->faq_sec_checked == 'on' ? 1 : 0,
                'faq_title' => isset($request->faq_title) ? $request->faq_title : '',
                'faq_sub_title' => isset($request->faq_sub_title) ? $request->faq_sub_title : '',
                'faq_img' => isset($request->faq_img) ? $request->faq_img : '',
            ]);
        }



        if (isset($request->why_choose_checked) && $request->why_choose_checked != '' && $request->why_choose_checked == 'on') {
            $why_choose = json_encode([
                'checked' => isset($request->why_choose_checked) && $request->why_choose_checked == 'on' ? 1 : 0,
                'why_choose_title' => isset($request->why_choose_title) ? $request->why_choose_title : '',
                'why_choose_sub_title' => isset($request->why_choose_sub_title) ? $request->why_choose_sub_title : '',

                'why_choose_img' => isset($request->why_choose_img) ? $request->why_choose_img : '',
                'why_choose_img1' => isset($request->why_choose_img1) ? $request->why_choose_img1 : '',
                'why_choose_img2' => isset($request->why_choose_img2) ? $request->why_choose_img2 : '',
                'why_choose_img3' => isset($request->why_choose_img3) ? $request->why_choose_img3 : '',
                'why_choose_img4' => isset($request->why_choose_img4) ? $request->why_choose_img4 : '',
                'why_choose_img5' => isset($request->why_choose_img5) ? $request->why_choose_img5 : '',
                'why_choose_img6' => isset($request->why_choose_img6) ? $request->why_choose_img6 : '',
                'why_choose_title1' => isset($request->why_choose_title1) ? $request->why_choose_title1 : '',
                'why_choose_title2' => isset($request->why_choose_title2) ? $request->why_choose_title2 : '',
                'why_choose_title3' => isset($request->why_choose_title3) ? $request->why_choose_title3 : '',
                'why_choose_title4' => isset($request->why_choose_title4) ? $request->why_choose_title4 : '',
                'why_choose_title5' => isset($request->why_choose_title5) ? $request->why_choose_title5 : '',
                'why_choose_title6' => isset($request->why_choose_title6) ? $request->why_choose_title6 : '',
                'why_choose_description1' => isset($request->why_choose_description1) ? $request->why_choose_description1 : '',
                'why_choose_description2' => isset($request->why_choose_description2) ? $request->why_choose_description2 : '',
                'why_choose_description3' => isset($request->why_choose_description3) ? $request->why_choose_description3 : '',
                'why_choose_description4' => isset($request->why_choose_description4) ? $request->why_choose_description4 : '',
                'why_choose_description5' => isset($request->why_choose_description5) ? $request->why_choose_description5 : '',
                'why_choose_description6' => isset($request->why_choose_description6) ? $request->why_choose_description6 : '',
            ]);
        }

        if (isset($request->design_sec_checked) && $request->design_sec_checked != '' && $request->design_sec_checked == 'on') {
            $design = json_encode([
                'checked' => isset($request->design_sec_checked) && $request->design_sec_checked == 'on' ? 1 : 0,
                'design_title' => isset($request->design_title) ? $request->design_title : '',
                'button_name' => isset($request->button_name) ? $request->button_name : '',
                'button_url' => isset($request->button_url) ? $request->button_url : '',
                'design_sub_title' => isset($request->design_sub_title) ? $request->design_sub_title : '',
                'design_description' => isset($request->design_description) ? $request->design_description : '',
                'design_img' => isset($request->design_img) ? $request->design_img : '',
            ]);
        }
        if (isset($request->newgarage_sec_checked) && $request->newgarage_sec_checked != '' && $request->newgarage_sec_checked == 'on') {
            $newgarage = json_encode([
                'checked' => isset($request->newgarage_sec_checked) && $request->newgarage_sec_checked == 'on' ? 1 : 0,
                'newgarage_title' => isset($request->newgarage_title) ? $request->newgarage_title : '',
                'newgarage_desc' => isset($request->newgarage_desc) ? $request->newgarage_desc : '',
            ]);
        }
        if (isset($request->location_sec_checked) && $request->location_sec_checked != '' && $request->location_sec_checked == 'on') {
            $location = json_encode([
                'checked' => isset($request->location_sec_checked) && $request->location_sec_checked == 'on' ? 1 : 0,
                'location_title' => isset($request->location_title) ? $request->location_title : '',
            ]);
        }
        if (isset($request->form_sec_checked) && $request->form_sec_checked != '' && $request->form_sec_checked == 'on') {
            $form = json_encode([
                'checked' => isset($request->form_sec_checked) && $request->form_sec_checked == 'on' ? 1 : 0,
                'form_title' => isset($request->form_title) ? $request->form_title : '',
                'form_sub_title' => isset($request->form_sub_title) ? $request->form_sub_title : '',
                'form_short_desc' => isset($request->form_short_desc) ? $request->form_short_desc : '',
                'form_btn_name' => isset($request->form_btn_name) ? $request->form_btn_name : '',
                'form_btn_url' => isset($request->form_btn_url) ? $request->form_btn_url : '',
            ]);
        }
        if (isset($request->calltoaction_checked) && $request->calltoaction_checked != '' && $request->calltoaction_checked == 'on') {
            $calltoaction = json_encode([
                'checked' => isset($request->calltoaction_checked) && $request->calltoaction_checked == 'on' ? 1 : 0,
                'calltoaction_title' => isset($request->calltoaction_title) ? $request->calltoaction_title : '',
                'calltosub_title' => isset($request->calltosub_title) ? $request->calltosub_title : '',
                'button_name' => isset($request->cl_button_name) ? $request->cl_button_name : '',
                'button_url' => isset($request->cl_button_url) ? $request->cl_button_url : '',
                'call_button_name' => isset($request->call_button_name) ? $request->call_button_name : '',
                'call_button_url' => isset($request->call_button_url) ? $request->call_button_url : '',
                'call_button_desc' => isset($request->call_button_desc) ? $request->call_button_desc : '',
            ]);
        }
        if (isset($request->quote_checked) && $request->quote_checked != '' && $request->quote_checked == 'on') {
            $quote = json_encode([
                'checked' => isset($request->quote_checked) && $request->quote_checked == 'on' ? 1 : 0,
                'quote_title' => isset($request->quote_title) ? $request->quote_title : '',
                'quotesub_title' => isset($request->quotesub_title) ? $request->quotesub_title : '',
                'quote_button_name' => isset($request->quote_button_name) ? $request->quote_button_name : '',
                'quote_button_url' => isset($request->quote_button_url) ? $request->quote_button_url : '',
                'quotecall_button_name' => isset($request->quotecall_button_name) ? $request->quotecall_button_name : '',
                'quotecall_button_url' => isset($request->quotecall_button_url) ? $request->quotecall_button_url : '',
                'quote_desc' => isset($request->quote_desc) ? $request->quote_desc : '',
                // 'quote_img' => isset($request->quote_img) ? $request->quote_img : '',
            ]);
        }





        $home = HomePageSetting::findOrfail($request->home_id);
        $edata = json_encode($home);

        if (auth()->user()->role == 'dealer' || auth()->user()->role == 'marketing') {
            if ($home) {
                $home->meta_title = isset($request->meta_title) ? $request->meta_title : $home->meta_title;
                $home->meta_keyword = isset($request->meta_keyword) ? $request->meta_keyword : $home->meta_keyword;
                $home->meta_description = isset($request->meta_description) ? $request->meta_description : $home->meta_description;
                $home->banner_sec = isset($banner) ? $banner : $home->banner_sec;
                $home->system_setting_sec = isset($system_setting) ? $system_setting : $home->system_setting_sec;
                $home->value_highlight_sec = isset($value_highlights) ? $value_highlights : $home->value_highlight_sec;
                $home->garage_door = isset($garage_door) ? $garage_door : $home->garage_door;
                $home->residential_sec = isset($residential) ? $residential : $home->residential_sec;
                $home->quote_sec = isset($quote) ? $quote : $home->quote_sec;
                $home->gallery_sec = isset($gallery) ? $gallery : $home->gallery_sec;
                $home->areas_sec = isset($areas) ? $areas : $home->areas_sec;
                $home->faq_sec = isset($faq) ? $faq : $home->faq_sec;
                $home->why_choose_sec = isset($why_choose) ? $why_choose : $home->why_choose_sec;
                $home->design_sec = isset($design) ? $design : $home->design_sec;
                $home->newgarage = isset($newgarage) ? $newgarage : $home->newgarage;
                $home->testimonial = isset($testimonial) ? $testimonial : $home->testimonial;
                $home->clientlogo = isset($clientlogo) ? $clientlogo : $home->clientlogo;
                $home->blog_sec = isset($blog) ? $blog : $home->blog_sec;
                $home->form_sec = isset($form) ? $form : $home->form_sec;
                $home->calltoaction = isset($calltoaction) ? $calltoaction : $home->calltoaction;
                $home->services_sec = isset($services_sec) ? $services_sec : $home->services_sec;
                $home->service_heading_section = isset($services_head_sec) ? $services_head_sec : $home->service_heading_section;

                $edt = Updatelog::create(['tablename' => 'home-page-settings', 'table_primary_id' => $home->id, 'edit_log' => $edata]);
                $home->update();
                return redirect()->route('setting.homepage.index')->with('success', 'Home Page Setting Saved Successfully.');
            }
        } else {
            if ($home) {
                $home->meta_title = $request->meta_title;
                $home->meta_keyword = $request->meta_keyword;
                $home->meta_description = $request->meta_description;
                $home->banner_sec = isset($banner) ? $banner : null;
                $home->system_setting_sec = isset($system_setting) ? $system_setting : null;
                $home->value_highlight_sec = isset($value_highlights) ? $value_highlights : null;
                $home->garage_door = isset($garage_door) ? $garage_door : null;
                $home->residential_sec = isset($residential) ? $residential : null;
                $home->quote_sec = isset($quote) ? $quote : null;
                $home->gallery_sec = isset($gallery) ? $gallery : null;
                $home->areas_sec = isset($areas) ? $areas : null;
                $home->faq_sec = isset($faq) ? $faq : null;
                $home->why_choose_sec = isset($why_choose) ? $why_choose : null;
                $home->design_sec = isset($design) ? $design : null;
                $home->newgarage = isset($newgarage) ? $newgarage : null;
                $home->testimonial = isset($testimonial) ? $testimonial : null;
                $home->clientlogo = isset($clientlogo) ? $clientlogo : null;
                $home->blog_sec = isset($blog) ? $blog : null;
                $home->form_sec = isset($form) ? $form : null;
                $home->calltoaction = isset($calltoaction) ? $calltoaction : null;
                $home->services_sec = isset($services_sec) ? $services_sec : null;
                $home->service_heading_section = isset($services_head_sec) ? $services_head_sec : null;

                $edt = Updatelog::create(['tablename' => 'home-page-settings', 'table_primary_id' => $home->id, 'edit_log' => $edata]);
                $home->update();
                return redirect()->route('setting.homepage.index')->with('success', 'Home Page Setting Saved Successfully.');
            }
        }

    }

    public function comment_index()
    {
        $comments = CommentSetting::first();
        return view('settings.commentsetting', compact('comments'));
    }
    public function comment_save(Request $request)
    {
        $comment = CommentSetting::first();
        $edata = json_encode($comment);
        if (isset($request->comment_id) && $request->comment_id != '' && $request->comment_id != null) {
            $comment->show_comments = isset($request->show_comments) && $request->show_comments == 'on' ? 1 : 0;
            $comment->comment_details = isset($request->comment_details) && $request->comment_details == 'on' ? 1 : 0;
            $comment->save();
            $edt = Updatelog::create(['tablename' => 'comment-setting', 'table_primary_id' => $comment->id, 'edit_log' => $edata]);
            return redirect()->route('comment.index')->with('success', 'Comment Setting Saved Successfully.');
        } else {
            return redirect()->route('comment.index')->with('error', 'Error in Saving Comment Setting!');
        }
    }



    public function locationdata_add()
    {


        return view('settings.locationform');
    }



    public function check_location_slug(Request $request)
    {
        $check = LocationPageSetting::where('location', $request->name)->first();

        if ($check) {
            return response()->json([
                'status' => 1,
                'message' => 'available'
            ]);
        }

        return response()->json([
            'status' => 2,
            'message' => 'unavailable'
        ]);
    }



    public function locationdata_store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:location_settings,slug',
            'type' => 'required|string|max:255',
        ], [
            'slug.unique' => 'This slug already exists. Please use a different slug.',
        ]);

        // ✅ EXACT SAME AS ARTICLE
        $slug = SlugService::createSlug(
            LocationPageSetting::class,
            'slug',
            $request->slug
        );

        $location = new LocationPageSetting();
        $location->location = $request->location;
        $location->slug = $slug;
        $location->type = $request->type;
        $location->status = 1;
        $location->created_by = auth()->id();
        $location->updated_by = auth()->id();
        $location->save();

        return redirect()
            ->route('setting.locationpage.index')
            ->with('success', 'Location added successfully');
    }
    public function locationpage_setting_view()
    {
        $locations = LocationPageSetting::get();
        // $banner = json_decode($location->banner_sec);
        // $system_setting = json_decode($location->system_setting_sec);
        // $garage_door = json_decode($location->garage_door);
        // $residential = json_decode($location->residential_sec);
        // $quote = json_decode($location->quote_sec);
        // $gallery = json_decode($location->gallery_sec);
        // $areas = json_decode($location->areas_sec);
        // $faq = json_decode($location->faq_sec);
        // $calltoaction = json_decode($location->calltoaction);
        // $design = json_decode($location->design_sec);
        // $newgarage = json_decode($location->newgarage);
        // $testimonial = json_decode($location->testimonial);
        // $clientlogo = json_decode($location->clientlogo);
        // $form = json_decode($location->form_sec);
        // $blog = json_decode($location->blog_sec);

        return view('settings.locationpagesetting', compact('locations'));
    }
    public function locationpage_setting_store(Request $request)
    {
        if ($request->location === 'default') {
            return redirect()->route('setting.locationpage.index')->with('error', 'Location not found Please select location.');
        }
        $data['banner_sec'] = json_encode([
            'checked' => isset($request->banner_checked) && $request->banner_checked == 'on' ? 1 : 0,
            'banner_title' => isset($request->banner_title) ? $request->banner_title : '',
            'banner_subtitle' => isset($request->banner_subtitle) ? $request->banner_subtitle : '',
            'banner_description' => isset($request->banner_description) ? $request->banner_description : '',
            'banner_img' => isset($request->banner_img) ? $request->banner_img : '',
            'banner_img_1100x480' => isset($request->banner_img_1100x480) ? $request->banner_img_1100x480 : '',
            'mobile_banner_img' => isset($request->mobile_banner_img) ? $request->mobile_banner_img : '',
        ]);

        $data['system_setting_sec'] = json_encode([
            'checked' => isset($request->system_setting_checked) && $request->system_setting_checked == 'on' ? 1 : 0,
            'system_setting_title' => isset($request->system_setting_title) ? $request->system_setting_title : '',
            'system_sub_title' => isset($request->system_sub_title) ? $request->system_sub_title : '',
            'system_setting_description' => isset($request->system_setting_description) ? $request->system_setting_description : '',
            'system_img' => isset($request->system_img) ? $request->system_img : '',
            'system_img1' => isset($request->system_img1) ? $request->system_img1 : '',
            'system_img2' => isset($request->system_img2) ? $request->system_img2 : '',
            'system_img3' => isset($request->system_img3) ? $request->system_img3 : '',
            'system_img4' => isset($request->system_img4) ? $request->system_img4 : '',
            'title1' => isset($request->title1) ? $request->title1 : '',
            'title2' => isset($request->title2) ? $request->title2 : '',
            'title3' => isset($request->title3) ? $request->title3 : '',
            'title4' => isset($request->title4) ? $request->title4 : '',
        ]);

        $data['areas_sec'] = json_encode([
            'checked' => isset($request->areas_checked) && $request->areas_checked == 'on' ? 1 : 0,
            'areas_title' => isset($request->areas_title) ? $request->areas_title : '',
            'areas_sub_title' => isset($request->areas_sub_title) ? $request->areas_sub_title : '',
            'areas_button_name' => isset($request->areas_button_name) ? $request->areas_button_name : '',
            'areas_button_url' => isset($request->areas_button_url) ? $request->areas_button_url : '',
            'areas_img' => isset($request->areas_img) ? $request->areas_img : '',
        ]);

        //calltoaction section


        $data['calltoaction'] = json_encode([
            'checked' => isset($request->calltoaction_checked) && $request->calltoaction_checked == 'on' ? 1 : 0,
            'calltoaction_title' => isset($request->calltoaction_title) ? $request->calltoaction_title : '',
            'calltosub_title' => isset($request->calltosub_title) ? $request->calltosub_title : '',
            'button_name' => isset($request->cl_button_name) ? $request->cl_button_name : '',
            'button_url' => isset($request->cl_button_url) ? $request->cl_button_url : '',
            'call_button_name' => isset($request->call_button_name) ? $request->call_button_name : '',
            'call_button_url' => isset($request->call_button_url) ? $request->call_button_url : '',
            'call_button_desc' => isset($request->call_button_desc) ? $request->call_button_desc : '',
        ]);

        $data['garage_door'] = json_encode([
            'checked' => isset($request->door_title_sec_checked) && $request->door_title_sec_checked == 'on' ? 1 : 0,
            'door_title' => isset($request->door_title) ? $request->door_title : '',

            'door_sub_title' => isset($request->door_sub_title) ? $request->door_sub_title : '',
            'garage_door_description' => isset($request->garage_door_description) ? $request->garage_door_description : '',
            'garage_img' => isset($request->garage_img) ? $request->garage_img : '',
        ]);

        $data['residential_sec'] = json_encode([
            // 'checked' => isset($request->door_title_sec_checked) && $request->door_title_sec_checked == 'on' ? 1 : 0,
            'resi_button_name' => isset($request->resi_button_name) ? $request->resi_button_name : '',
            'resi_button_url' => isset($request->resi_button_url) ? $request->resi_button_url : '',
        ]);




        $data['faq_sec'] = json_encode([
            'checked' => isset($request->faq_sec_checked) && $request->faq_sec_checked == 'on' ? 1 : 0,
            'faq_title' => isset($request->faq_title) ? $request->faq_title : '',
            'faq_sub_title' => isset($request->faq_sub_title) ? $request->faq_sub_title : '',
            'faq_img' => isset($request->faq_img) ? $request->faq_img : '',
        ]);



        $data['why_choose_sec'] = json_encode([

            'checked' => isset($request->why_choose_checked) && $request->why_choose_checked == 'on' ? 1 : 0,
            'why_choose_title' => isset($request->why_choose_title) ? $request->why_choose_title : '',
            'why_choose_sub_title' => isset($request->why_choose_sub_title) ? $request->why_choose_sub_title : '',

            'why_choose_img1' => isset($request->why_choose_img1) ? $request->why_choose_img1 : '',
            'why_choose_img2' => isset($request->why_choose_img2) ? $request->why_choose_img2 : '',
            'why_choose_img3' => isset($request->why_choose_img3) ? $request->why_choose_img3 : '',
            'why_choose_img4' => isset($request->why_choose_img4) ? $request->why_choose_img4 : '',
            'why_choose_img5' => isset($request->why_choose_img5) ? $request->why_choose_img5 : '',
            'why_choose_img6' => isset($request->why_choose_img6) ? $request->why_choose_img6 : '',
            'why_choose_title1' => isset($request->why_choose_title1) ? $request->why_choose_title1 : '',
            'why_choose_title2' => isset($request->why_choose_title2) ? $request->why_choose_title2 : '',
            'why_choose_title3' => isset($request->why_choose_title3) ? $request->why_choose_title3 : '',
            'why_choose_title4' => isset($request->why_choose_title4) ? $request->why_choose_title4 : '',
            'why_choose_title5' => isset($request->why_choose_title5) ? $request->why_choose_title5 : '',
            'why_choose_title6' => isset($request->why_choose_title6) ? $request->why_choose_title6 : '',
            'why_choose_description1' => isset($request->why_choose_description1) ? $request->why_choose_description1 : '',
            'why_choose_description2' => isset($request->why_choose_description2) ? $request->why_choose_description2 : '',
            'why_choose_description3' => isset($request->why_choose_description3) ? $request->why_choose_description3 : '',
            'why_choose_description4' => isset($request->why_choose_description4) ? $request->why_choose_description4 : '',
            'why_choose_description5' => isset($request->why_choose_description5) ? $request->why_choose_description5 : '',
            'why_choose_description6' => isset($request->why_choose_description6) ? $request->why_choose_description6 : '',
        ]);

        $data['quote_sec'] = json_encode([
            'checked' => isset($request->quote_checked) && $request->quote_checked == 'on' ? 1 : 0,
            'quote_title' => isset($request->quote_title) ? $request->quote_title : '',
            'quotesub_title' => isset($request->quotesub_title) ? $request->quotesub_title : '',
            'quote_button_name' => isset($request->quote_button_name) ? $request->quote_button_name : '',
            'quote_button_url' => isset($request->quote_button_url) ? $request->quote_button_url : '',
            'quotecall_button_name' => isset($request->quotecall_button_name) ? $request->quotecall_button_name : '',
            'quotecall_button_url' => isset($request->quotecall_button_url) ? $request->quotecall_button_url : '',
            'quote_desc' => isset($request->quote_desc) ? $request->quote_desc : '',
        ]);


        $data['meta_tags_sec'] = json_encode([
            'checked' => isset($request->metatag_checked) && $request->metatag_checked == 'on' ? 1 : 0,
            'meta_title' => isset($request->meta_title) ? $request->meta_title : '',
            'meta_keyword' => isset($request->meta_keyword) ? $request->meta_keyword : '',
            'meta_description' => isset($request->meta_description) ? $request->meta_description : '',

        ]);


        $dataArray = [


            'gallery_sec',
            'blog_sec',

            'design_sec',
            'newgarage',
            'testimonial',
            'clientlogo',
            'form_sec'
        ];

        $data['service_heading_section'] = json_encode([
            'title' => $request->service_head_title ? $request->service_head_title : '',
            'description' => $request->service_head_description ? $request->service_head_description : '',
        ]);

        $serviceTitle = $request->service_title ?? [];
        $serviceDescription = $request->service_description ?? [];
        $serviceImg = $request->service_img ?? [];
        $serviceUrl = $request->service_url ?? [];
        $urlTitle = $request->url_title ?? [];

        $services = [];
        foreach ($serviceTitle as $i => $title) {
            if (
                !empty($title) &&
                !empty($serviceDescription[$i]) &&
                !empty($serviceImg[$i])
            ) {
                $services[] = [
                    'title' => $title,
                    'description' => $serviceDescription[$i],
                    'img' => $serviceImg[$i],
                    'url' => $serviceUrl[$i],
                    'urltitle' => $urlTitle[$i],
                ];
            }
        }

        if (count($services)) {
            $data['services_sec'] = json_encode($services);
        } else {
            $dataArray[] = 'services_sec';
        }

        foreach ($dataArray as $key) {
            $data[$key] = null;
        }
        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();
        $save = LocationPageSetting::updateOrCreate(
            ['location' => $request->location],
            $data
        );
        if ($save) {
            return redirect()->route('setting.locationpage.index')->with('success', 'Location Page Setting Saved Successfully.');
        } else {
            return redirect()->route('setting.locationpage.index')->with('error', 'Something went wrong while updating the Location settings.');
        }
    }

    public function fetchLocationSetting(Request $request)
    {
        $search = $request->get('location') ?? null;
        $location = LocationPageSetting::where('location', $search)->first();
        if (!$location)
            return response()->json([
                'success' => false,
                'message' => 'Location settings not found',
                'data' => []
            ]);
        $banner = json_decode($location->banner_sec);
        $system_setting = json_decode($location->system_setting_sec);
        $services_sec = json_decode($location->services_sec);
        $services_head_sec = json_decode($location->service_heading_section);
        $garage_door = json_decode($location->garage_door);
        $residential = json_decode($location->residential_sec);
        $quote = json_decode($location->quote_sec);
        $meta_tags = json_decode($location->meta_tags_sec);
        // $gallery = json_decode($location->gallery_sec);
        $area_serve = json_decode($location->areas_sec);
        $why_choose = json_decode($location->why_choose_sec);



        $faq = json_decode($location->faq_sec);
        $calltoaction = json_decode($location->calltoaction);
        // $design = json_decode($location->design_sec);
        // $newgarage = json_decode($location->newgarage);
        // $testimonial = json_decode($location->testimonial);
        // $clientlogo = json_decode($location->clientlogo);
        // $form = json_decode($location->form_sec);
        // $blog = json_decode($location->blog_sec);
        return response()->json([
            'success' => true,
            'message' => 'Location page settings fetched successfully',
            'data' => compact(
                'location',
                'banner',
                'system_setting',
                'services_sec',
                'services_head_sec',
                'area_serve',
                'garage_door',
                'faq',
                'residential',
                'why_choose',
                'quote',
                'meta_tags',
                'calltoaction',
                //     'gallery', 'areas',  'calltoaction', 'design', 'newgarage', 'testimonial', 'clientlogo', 'form', 'blog'
            ),
        ]);
        // return view('settings.locationpagesetting', compact('location', 'banner', 'system_setting', 'garage_door', 'quote', 'residential', 'gallery', 'areas', 'faq', 'calltoaction', 'design', 'newgarage', 'testimonial', 'clientlogo', 'form', 'blog'));
    }
}
