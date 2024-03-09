<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting\GeneralSetting;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('locale', \App::getLocale());
            $view->with('url',\Request::Path());
            $view->with('setting',Schema::hasTable('general_settings')?GeneralSetting::where('lang',\App::getLocale())->first():'null');
        });

        if(Schema::hasTable('general_settings')){
            $appSetting = GeneralSetting::where('lang',\App::getLocale())->first();
            if($appSetting){
                \Config::set('mail.from.address',$appSetting->email!==null?$appSetting->email:'info@gmail.com');
                \Config::set('mail.mailers.smtp.username',$appSetting->email!==null?$appSetting->email:'info@gmail.com');
                \Config::set('mail.mailers.smtp.password',$appSetting->email_password!==null?$appSetting->email_password:'info@123');
                \Config::set('mail.from.name',$appSetting->name!==null?$appSetting->name:'Configured system');
                \Config::set('app.name',$appSetting->name!==null?$appSetting->name:'Configured system');
            }
        }
        Paginator::useBootstrap();
    }
}
