<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Apimenu;
use App\Models\Apicategorydata;
use App\Models\Apiproductdata;
use App\Models\Apisubcategorydata;
use App\Models\Apibannerdata;
use App\Models\Apisetting;

class GetapiData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:getapi-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {


        // Log::info('This is a log message from the cron job!');
        // $this->info('Message logged successfully!');


        $apimenu = Apimenu::where('menutype','residential')->first();

        if(!$apimenu)
            $apimenu = new Apimenu();
        
        $residential_menus = getResidentialMenus();

        if(count($residential_menus) > 0){
            Log::info('Residential Menu Data: Success');
            $apimenu->menus = json_encode($residential_menus);
            $apimenu->is_updated = 1;
            $result = $apimenu->save();
        }

        $apimenuc = Apimenu::where('menutype','commercial')->first();

        if(!$apimenuc)
            $apimenuc = new Apimenu();
        
        $commercial_menus = getCommercialMenus();

        if(count($commercial_menus) > 0){
            Log::info('Commercial Menu Data: Success');
            $apimenuc->menus = json_encode($commercial_menus);
            $apimenuc->is_updated = 1;
            $result = $apimenuc->save();
        }

        $apimenuo = Apimenu::where('menutype','openers')->first();

        if(!$apimenuo)
            $apimenuo = new Apimenu();
        
        $openers = getOpenersMenus();

        if(count($openers) > 0){
            $apimenuo->menus = json_encode($openers);
            $apimenuo->is_updated = 1;
            $result = $apimenuo->save();
        }

        // Banner Data
        $banner_data = getRecordsproduct('POST',['token'=>env("API_TOKEN")], 'banners');

        
        if($banner_data){
            if($banner_data->status == 'Success'){
                Log::info('Banners API Data Success:');
                $s_existing_banners = Apibannerdata::pluck('banner_id')->toArray();
               
                foreach($banner_data->data as $key=>$val){
                    $existing_banner = Apibannerdata::where('banner_id',$val->id)->first();
                    if(!$existing_banner)
                    {
                       $existing_banner = new Apibannerdata();
                       $existing_banner->banner_id = isset($val->id) ? $val->id : null;
                    }
                    $existing_banner->banner_image = isset($val->banner_image) ? $val->banner_image : null;
                    $existing_banner->banner_title = isset($val->banner_title) ? $val->banner_title : null;
                    $existing_banner->banner_subtitle = isset($val->banner_subtitle) ? $val->banner_subtitle : null;
                    $existing_banner->banner_description = isset($val->banner_description) ? $val->banner_description : null;
                    $existing_banner->category = isset($val->category) ? $val->category : null;
                    $existing_banner->link_category = isset($val->link_category) ? $val->link_category : null;
                    $existing_banner->link_sub_category = isset($val->link_sub_category) ? $val->link_sub_category : null;
                    $existing_banner->link_product = isset($val->link_product) ? $val->link_product : null;
                    $existing_banner->parent_cat_slug = isset($val->parent_cat_slug) ? $val->parent_cat_slug : null;
                    $existing_banner->save();

                    if (($key = array_search($existing_banner->banner_id, $s_existing_banners)) !== FALSE) {
                        unset($s_existing_banners[$key]);
                    }
                }
                if(isset($s_existing_banners) && count($s_existing_banners) > 0){
                    Apibannerdata::whereIn('banner_id',$s_existing_banners)->delete();
                }
            }
        }
    }

}
