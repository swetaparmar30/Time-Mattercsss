<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\Apimenu;
use App\Models\Apicategorydata;
use App\Models\Apiproductdata;
use App\Models\Apisubcategorydata;
use App\Models\Apibannerdata;

class GetResidentialData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:getresidentialapi-data';

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

        
        $data = getRecordsproduct('POST',['token'=>env("API_TOKEN"), 'type'=>'residential', 'getsubproduct' => 'Yes'], 'residentialpage');
        if ($data && isset($data->status) && $data->status == 'Success') {
            Log::info('Residential API Data: Success', );
            // Log::info('Residential API Data: Success', ['response' => $data]);
        } else {
            Log::error('Residential API Response Invalid:', ['response' => $data]);
        }
        $exist_slugs = Apicategorydata::pluck('category')->where('menutype','residential')->toArray();

        if($data){
            if($data->status == 'Success'){
                foreach($data->data as $key=>$val){

                    $exist = Apicategorydata::where('menutype','residential')->where('category',$val->slug)->first();
                    if(!$exist)
                        $exist = new Apicategorydata();

                    $exist->menutype = 'residential';
                    $exist->category = $val->slug;
                    $exist->category_type = $val->category_type;
                    $exist->order = isset($val->order) ? $val->order : null;
                    $exist->category_json = json_encode(['category'=>$val->category, 'title'=>$val->title, 'description'=>$val->description, 'slug'=>$val->slug]);
                    $result = $exist->save();
                    if(count($val->products) > 0){
                        $exist_slugsp = Apiproductdata::where('menutype','residential')->where('category',$val->slug)->pluck('product')->toArray();

                        foreach($val->products as $keyp=>$valp){

                            $existp = Apiproductdata::where('menutype','residential')->where('category',$val->slug)->where('product',$valp->product_slug)->first();
                            if(!$existp){
                                $existp = new Apiproductdata();
                                $existp->product_json = json_encode($valp);
                            }
                            $existp->menutype = 'residential';
                            $existp->category = $val->slug;
                            $existp->product = $valp->product_slug;
                            $existp->order = isset($valp->order) ? $valp->order : null;
                            $result = $existp->save();

                            if (($key = array_search($valp->product_slug, $exist_slugsp)) !== FALSE) {
                                unset($exist_slugsp[$key]);
                            }
                        }
                        if(count($exist_slugsp) > 0){
                            Apiproductdata::whereIn('product',$exist_slugsp)->where('menutype','residential')->delete();
                        }
                    }

                    if (($key = array_search($val->slug, $exist_slugs)) !== FALSE) {
                        unset($exist_slugs[$key]);
                    }

                    if(count($val->subcategories) > 0){
                        $exist_sub = Apisubcategorydata::where('menutype','residential')->where('category',$val->slug)->pluck('subcategory')->toArray();
                        
                        foreach($val->subcategories as $keyp=>$valp){

                            $existpc = Apisubcategorydata::where('menutype','residential')->where('category',$val->slug)->where('subcategory',$valp->slug)->first();
                            
                            
                            if(!$existpc){
                                $existpc = new Apisubcategorydata();
                            }

                            $existpc->category_json = json_encode($valp);
                            $existpc->menutype = 'residential';
                            $existpc->category = $val->slug;
                            $existpc->subcategory = $valp->slug;
                            $existpc->order = isset($valp->order) ? $valp->order : null;
                            $result = $existpc->save();

                            if(isset(($valp->products))){
                                if(count($valp->products) > 0){
                                    $exist_slugspcp = Apiproductdata::where('menutype','residential')->where('category',$val->slug)->where('subcategory',$valp->slug)->pluck('product')->toArray();

                                    foreach($valp->products as $keypp=>$valpp){

                                        $existpc = Apiproductdata::where('menutype','residential')->where('category',$val->slug)->where('product',$valpp->product_slug)->first();
                                        if(!$existpc){
                                            $existpc = new Apiproductdata();
                                            $existpc->product_json = json_encode($valpp);
                                        }

                                        $existpc->menutype = 'residential';
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
                                        Apiproductdata::where('menutype','residential')->where('subcategory',$valp->slug)->whereIn('product',$exist_slugspcp)->delete();
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

                if(count($exist_slugs) > 0){
                    Apicategorydata::where('menutype','residential')->whereIn('category',$exist_slugs)->delete();
                }
            }
        }

        //$resproducts = Apiproductdata::inRandomOrder()->where('menutype','residential')->limit(15)->get();
        $resproducts = Apiproductdata::inRandomOrder()->where('menutype','residential')->where('updated_at', '<', now()->subMinutes(30))->pluck('product')->take(15)->toArray();
        $resproducts = array_unique($resproducts);
        
        foreach($resproducts as $resk => $resvl){
            $datas = getRecordsproduct('POST',['token'=>env("API_TOKEN"), 'type'=>'residential', 'slug'=>$resvl], 'product_detail');

            if($datas){
                if($datas->status == 'Success'){
                    $prdt = json_decode( json_encode($datas->data), true);
                    if($prdt){
                        $resvlp = Apiproductdata::where('menutype','residential')->where('product',$resvl)->update(['product_json'=>$prdt[0]]);
                    }
                }
            }

        }
        
        sleep(600);
        $this->call('app:getcommercialapi-data');

    }

}
