<?php

namespace WebshopMaintenanceMode\Providers;

use Plenty\Plugin\ServiceProvider;
use WebshopMaintenanceMode\Middlewares\WebshopMaintenanceModeMiddleware;

class WebshopMaintenanceModeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->addGlobalMiddleware(WebshopMaintenanceModeMiddleware::class);
    }
    
    public function boot()
    {
    
    }
}