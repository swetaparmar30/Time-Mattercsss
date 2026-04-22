<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmailSetting;
use App\Models\ClientLogo;
use App\Models\Testimonial;
use App\Models\Apimenu;
use App\Models\HomePageSetting;
use Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Artisan;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        $mailsetting = EmailSetting::first();
        if($mailsetting){
            $data = [
                'driver'            => $mailsetting->transport,
                'host'              => $mailsetting->host,
                'port'              => $mailsetting->port,
                'encryption'        => $mailsetting->encryption,
                'username'          => $mailsetting->username,
                'password'          => $mailsetting->password,
                'from'              => [
                    'address'=>$mailsetting->from_address,
                    'name'   => $mailsetting->from_name
                ]
            ];
            Config::set('mail',$data);
        }
    }
}
