<?php

if(! function_exists('getResidentialMenus')){
    function getResidentialMenus(){
        $data = [
            'token' => env("API_TOKEN"),
            'type' => 'residential'
        ];

        $result_array = [];
             
        $menus = getRecords('POST',$data);
       
        if($menus->status == 'Success' && count($menus->data) > 0){
            foreach($menus->data as $key=>$menu){
                if(isset($menu->category_type) && $menu->category_type != ''){
                    $result_array[$menu->category_type][] = $menu;
                }else{
                    $result_array['main'][] = $menu;
                }
            }
        }
        return $result_array;
    }
}

if(! function_exists('getCommercialMenus')){
    function getCommercialMenus(){
        $data = [
            'token' => env("API_TOKEN"),
            'type' => 'commercial'
        ];

        $result_array = [];
             
        $menus = getRecords('POST',$data);
       
        if($menus->status == 'Success' && count($menus->data) > 0){
            foreach($menus->data as $key=>$menu){
                if(isset($menu->category_type) && $menu->category_type != ''){
                    $result_array[$menu->category_type][] = $menu;
                }else{
                    $result_array['main'][] = $menu;
                }
            }
        }
        return $result_array;
    }
}

if(! function_exists('getRecords')){
    function getRecords($method_request, $data){
    
        $headers = [
            'Content-Type: multipart/form-data'
        ];
        $url = env("API_URL").'category_filter/list';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        if($method_request == 'POST'){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }else{
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

?>