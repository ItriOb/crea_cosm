<?php

namespace ContainerKm3ZQAJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSondagesControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\SondagesController' shared autowired service.
     *
     * @return \App\Controller\SondagesController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/SondagesController.php';

        $container->services['App\\Controller\\SondagesController'] = $instance = new \App\Controller\SondagesController();

        $instance->setContainer(($container->privates['.service_locator.CshazM0'] ?? $container->load('get_ServiceLocator_CshazM0Service'))->withContext('App\\Controller\\SondagesController', $container));

        return $instance;
    }
}
