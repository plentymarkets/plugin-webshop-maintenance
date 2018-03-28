<?php

namespace WebshopMaintenanceMode\Middlewares;

use Plenty\Plugin\Middleware;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Templates\Twig;

class WebshopMaintenanceModeMiddleware extends Middleware
{
    public function before(Request $request)
    {
    
    }
    
    public function after(Request $request, Response $response)
    {
        /** @var Twig $twig */
        $twig = pluginApp(Twig::class);
        
        $response->setContent($twig->render('WebshopMaintenanceMode::MaintenancePage'));
        return $response;
    }
}