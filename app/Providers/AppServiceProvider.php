<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

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
        $frontMenu = [
            '/'=> 'Home'
        ];
        $pages = Page::all();
        foreach($pages as $page){
            $frontMenu[$page['slug']] = $page['title'];
        }
        view()->share('frontMenu', $frontMenu);

        $config=[];
        $settings = Setting::all();
        foreach($settings as $setting){
         $config[$setting['name']] = $setting['content'] ;  
        }

        view()->share('frontConfig', $config);

        FacadesGate::define('edit-users', function (User $user) {
            return $user->admin === 1;
        });
    }
}
