<?php

namespace App\Providers;

use App\Database;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\PageController;
use App\Forms;
use App\PostTypes\Policy;
use Rareloop\Lumberjack\Providers\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any app specific items into the container
     */
    public function register()
    {
        new PageController();
        new AssetsController();
        new Database\Testimonial();
        new Database\Team();
        new Database\Guide();
        new Forms\Guide();
    }

    /**
     * Perform any additional boot required for this application
     */
    public function boot()
    {
        add_filter('acf/settings/show_admin', '__return_false');

        add_filter('timber/context', function ($context) {
            $context['policies'] = Policy::getPublished();
            return $context;
        });
    }
}
