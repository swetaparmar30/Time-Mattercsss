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

class GetCommercialData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:getcommercialapi-data';

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

        //Custom Css
        $css_data = getRecordsproduct('POST',['token'=>env("API_TOKEN")], 'settings');

        if($css_data){
            if($css_data->status == 'Success'){
                Log::info('Custom Css API Data Success:');
                $custom_css = $css_data->data[0]->custom_css ?? null;
                if ($custom_css) {
                    $apisetting = Apisetting::first();
                    if ($apisetting) {
                        $apisetting->custom_css = $custom_css;
                        $apisetting->save();
                    }else{
                        $apisetting = new Apisetting();
                        $apisetting->custom_css = $custom_css;
                        $apisetting->save();
                    }
                }
            }
        }

        $datac = getRecordsproduct('POST',['token'=>env("API_TOKEN"), 'type'=>'commercial', 'getsubproduct' => 'Yes'], 'commercialpage');
        if ($datac && isset($datac->status) && $datac->status == 'Success') {
            // Log::info('Commerial API Data:', ['data' => $datac->data]);
            Log::info('Commerial API Data: Success');
        } else {
            Log::error('Commerial API Response Invalid:', ['response' => $datac]);
        }


        $exist_slugsc = Apicategorydata::pluck('category')->where('menutype','commercial')->toArray();

        if($datac){
            if($datac->status == 'Success'){
                foreach($datac->data as $key=>$val){

                    $existcc = Apicategorydata::where('menutype','commercial')->where('category',$val->slug)->first();
                    

                    if(!$existcc)
                        $existcc = new Apicategorydata();

                    $existcc->menutype = 'commercial';
                    $existcc->category = $val->slug;
                    $existcc->category_type = $val->category_type;
                    $existcc->order = isset($val->order) ? $val->order : null;
                    $existcc->category_json = json_encode(['category'=>$val->category, 'title'=>$val->title, 'description'=>$val->description, 'slug'=>$val->slug]);
                    $result = $existcc->save();
                    if(count($val->products) > 0){
                        $exist_slugspc = Apiproductdata::where('menutype','commercial')->where('category',$val->slug)->where('subcategory',null)->pluck('product')->toArray();

                        

                        foreach($val->products as $keyp=>$valp){

                            $existpc = Apiproductdata::where('menutype','commercial')->where('category',$val->slug)->where('product',$valp->product_slug)->first();
                            if(!$existpc){
                                $existpc = new Apiproductdata();
                                $existpc->product_json = json_encode($valp);
                            }

                            $existpc->menutype = 'commercial';
                            $existpc->category = $val->slug;
                            $existpc->product = $valp->product_slug;
                            $existpc->order = isset($valp->order) ? $valp->order : null;
                            $result = $existpc->save();

                            if (($key = array_search($valp->product_slug, $exist_slugspc)) !== FALSE) {
                                unset($exist_slugspc[$key]);
                            }
                        }
                        
                        if(count($exist_slugspc) > 0){
                            Apiproductdata::whereIn('product',$exist_slugspc)->where('menutype','commercial')->delete();
                        }
                    }

                    if (($key = array_search($val->slug, $exist_slugsc)) !== FALSE) {
                        unset($exist_slugsc[$key]);
                    }

                    // if($val->slug == 'agricultural-doors'){
                    //     Log::info($val->subcategories);
                    // }

                    if(count($val->subcategories) > 0){
                        $exist_sub = Apisubcategorydata::where('menutype','commercial')->where('category',$val->slug)->pluck('subcategory')->toArray();
                        
                        foreach($val->subcategories as $keyp=>$valp){

                            $existpc = Apisubcategorydata::where('menutype','commercial')->where('category',$val->slug)->where('subcategory',$valp->slug)->first();
                            
                            
                            if(!$existpc){
                                $existpc = new Apisubcategorydata(); 
                            }
                            $existpc->category_json = json_encode($valp);
                            $existpc->menutype = 'commercial';
                            $existpc->category = $val->slug;
                            $existpc->subcategory = $valp->slug;
                            $existpc->order = isset($valp->order) ? $valp->order : null;
                            $result = $existpc->save();

                            if(isset(($valp->products))){
                                if(count($valp->products) > 0){
                                    $exist_slugspcp = Apiproductdata::where('menutype','commercial')->where('category',$val->slug)->where('subcategory',$valp->slug)->pluck('product')->toArray();

                                    foreach($valp->products as $keypp=>$valpp){

                                        $existpc = Apiproductdata::where('menutype','commercial')->where('category',$val->slug)->where('product',$valpp->product_slug)->first();
                                        if(!$existpc){
                                            $existpc = new Apiproductdata();
                                            $existpc->product_json = json_encode($valpp);
                                        }
                                        $existpc->menutype = 'commercial';
                                        $existpc->category = $val->slug;
                                        $existpc->subcategory = $valp->slug;
                                        $existpc->product = $valpp->product_slug;
                                        $existpc->order = isset($valpp->order) ? $valpp->order : null;
                                        $result = $existpc->save();

                                        if (($key = array_search($valpp->product_slug, $exist_slugspcp)) !== FALSE) {
                                            unset($exist_slugspcp[$key]);
                                        }
                                    }
                                    if(count($exist_slugspcp) > 0){
                                        Apiproductdata::where('menutype','commercial')->where('subcategory',$valp->slug)->whereIn('product',$exist_slugspcp)->delete();
                                    }
                                }
                            }

                            if (($key = array_search($valp->slug, $exist_sub)) !== FALSE) {
                                unset($exist_sub[$key]);
                            }
                        }
                        if(count($exist_sub) > 0){
                            Apisubcategorydata::where('category',$val->slug)->whereIn('subcategory',$exist_sub)->delete();
                        }
                    }
                }

                if(count($exist_slugsc) > 0){
                    Apicategorydata::whereIn('category',$exist_slugsc)->delete();
                }
            }
        }


        $comproducts = Apiproductdata::inRandomOrder()->where('menutype','commercial')->where('updated_at', '<', now()->subMinutes(30))->pluck('product')->take(20)->toArray();
        $comproducts = array_unique($comproducts);

        foreach($comproducts as $comk => $comvl){
            $datas = getRecordsproduct('POST',['token'=>env("API_TOKEN"), 'type'=>'commercial', 'slug'=>$comvl], 'product_detail');

            if($datas){
                if($datas->status == 'Success'){
                    $prdt = json_decode( json_encode($datas->data), true);
                    if($prdt){
                        $resvlp = Apiproductdata::where('menutype','commercial')->where('product',$comvl)->update(['product_json'=>$prdt[0]]);
                    }
                }
            }

        }
        


        // sleep(600);
        // $this->call('app:getapi-data');
    }

}
