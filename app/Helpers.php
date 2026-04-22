<?php

use App\Models\Apiproductdata;

if (! function_exists('getResidentialMenus')) {
    function getResidentialMenus()
    {
        $data = [
            'token' => env("API_TOKEN"),
            'type' => 'residential'
        ];

        $result_array = [];

        $menus = getRecords('POST', $data);

        if ($menus->status == 'Success' && count($menus->data) > 0) {
            foreach ($menus->data as $key => $menu) {
                if (isset($menu->category_type) && $menu->category_type != '') {
                    $result_array[$menu->category_type][] = $menu;
                } else {
                    $result_array['main'][] = $menu;
                }
            }
        }
        return $result_array;
    }
}

if (! function_exists('getCommercialMenus')) {
    function getCommercialMenus()
    {
        $data = [
            'token' => env("API_TOKEN"),
            'type' => 'commercial'
        ];

        $result_array = [];

        $menus = getRecords('POST', $data);

        if ($menus->status == 'Success' && count($menus->data) > 0) {
            foreach ($menus->data as $key => $menu) {
                if (isset($menu->category_type) && $menu->category_type != '') {
                    $result_array[$menu->category_type][] = $menu;
                } else {
                    $result_array['main'][] = $menu;
                }
            }
        }
        return $result_array;
    }
}

if (! function_exists('getRecords')) {
    function getRecords($method_request, $data)
    {

        $headers = [
            'Content-Type: multipart/form-data'
        ];
        $url = env("API_URL") . 'category_filter/list';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        if ($method_request == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
            curl_setopt($ch, CURLOPT_GET, true);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($output);
        return $response;
    }
}

if(! function_exists('getCommercialProductUrl')){
    function getCommercialProductUrl($slug){
        $product_url = Apiproductdata::where('product', $slug)->first();
        if(!$product_url){
            Log::warning('Commercial product not found', ['slug' => $slug]);
            return '#';
        }
        
        if(!empty($product_url->maincat)){
            return url(
                'commercial/'
                .$product_url->maincat.'/'
                .$slug
            );
        }

        
        return url(
            'commercial/'
            .$product_url->category.'/'
            .$slug
        );
    }
}

if(! function_exists('getRecordsproduct')){
    function getRecordsproduct($method_request, $data, $cat){

        $data = json_encode($data);
        
        $headers = [
            'Content-Type: application/json'
        ];
        if($cat){
            if($cat == 'residentialpage' || $cat == 'commercialpage' || $cat == 'seriespage'){
                $url = env("API_URL").'product/listcategory';
            }
            if($cat == 'product_detail'){
                $url = env("API_URL").'product/detail';
            }
            if($cat == 'subcategory'){
                $url = env("API_URL").'product/listsubcategory';
            }
            if($cat == 'banners')
            {
                $url = env("API_URL").'banner/list';
            }
            if($cat == 'settings')
            {
                $url = env("API_URL").'settings/custom-css';
            }
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false);
        if($method_request == 'POST'){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }else{
            curl_setopt($ch, CURLOPT_GET, true);
        }
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); // Set connection timeout to 10 seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($output === false) {
            $error = curl_error($ch);
            error_log("cURL Error: $error");
        } else if ($httpCode != 200) {
            error_log("HTTP Code: $httpCode, Response: $output");
        }

        $response = json_decode($output);

        return $response;
    }
}

// if (!function_exists('getMediaImgPath')) {
//     function getMediaImgPath($id)
//     {
//         $img = \App\Models\MediaImage::find($id)->name;
//         return url($img);
//     }
// }
