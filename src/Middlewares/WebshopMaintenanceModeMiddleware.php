<?php

namespace WebshopMaintenanceMode\Middlewares;


use Plenty\Plugin\Application;
use Plenty\Plugin\Middleware;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Modules\System\Contracts\WebstoreConfigurationRepositoryContract;
use Plenty\Modules\System\Models\WebstoreConfiguration;
use Plenty\Plugin\Templates\Twig;

class WebshopMaintenanceModeMiddleware extends Middleware
{
    public function before(Request $request)
    {
    
    }
    
    public function after(Request $request, Response $response)
    {
        /** @var Application $app */
        $app = pluginApp(Application::class);
        
        /** @var WebstoreConfigurationRepositoryContract $webstoreConfig */
        $webstoreConfigRepo = pluginApp(WebstoreConfigurationRepositoryContract::class);
        
        /** @var WebstoreConfiguration $webstoreConfig */
        $webstoreConfig = $webstoreConfigRepo->findByPlentyId($app->getPlentyId());
        
        /** @var Twig $twig */
        $twig = pluginApp(Twig::class);
    
        $response = $response->make(
            $twig->render('WebshopMaintenanceMode::MaintenancePage', ['webstoreName' => $webstoreConfig->name]),
            200
        );
        
        return $response;
    }
}