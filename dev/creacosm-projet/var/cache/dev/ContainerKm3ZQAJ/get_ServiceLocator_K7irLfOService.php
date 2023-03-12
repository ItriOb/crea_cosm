<?php

namespace ContainerKm3ZQAJ;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_K7irLfOService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.k7irLfO' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.k7irLfO'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\RacineController::register' => ['privates', '.service_locator.9auUp_E', 'get_ServiceLocator_9auUpEService', true],
            'App\\Controller\\SecurityController::login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Controller\\SondagesController::delete' => ['privates', '.service_locator.I2DnaFa', 'get_ServiceLocator_I2DnaFaService', true],
            'App\\Controller\\SondagesController::edit' => ['privates', '.service_locator.I2DnaFa', 'get_ServiceLocator_I2DnaFaService', true],
            'App\\Controller\\SondagesController::index' => ['privates', '.service_locator.Roqezgm', 'get_ServiceLocator_RoqezgmService', true],
            'App\\Controller\\SondagesController::new' => ['privates', '.service_locator.Roqezgm', 'get_ServiceLocator_RoqezgmService', true],
            'App\\Controller\\SondagesController::show' => ['privates', '.service_locator.iJVNhnm', 'get_ServiceLocator_IJVNhnmService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\RacineController:register' => ['privates', '.service_locator.9auUp_E', 'get_ServiceLocator_9auUpEService', true],
            'App\\Controller\\SecurityController:login' => ['privates', '.service_locator.rSTd.nA', 'get_ServiceLocator_RSTd_NAService', true],
            'App\\Controller\\SondagesController:delete' => ['privates', '.service_locator.I2DnaFa', 'get_ServiceLocator_I2DnaFaService', true],
            'App\\Controller\\SondagesController:edit' => ['privates', '.service_locator.I2DnaFa', 'get_ServiceLocator_I2DnaFaService', true],
            'App\\Controller\\SondagesController:index' => ['privates', '.service_locator.Roqezgm', 'get_ServiceLocator_RoqezgmService', true],
            'App\\Controller\\SondagesController:new' => ['privates', '.service_locator.Roqezgm', 'get_ServiceLocator_RoqezgmService', true],
            'App\\Controller\\SondagesController:show' => ['privates', '.service_locator.iJVNhnm', 'get_ServiceLocator_IJVNhnmService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\RacineController::register' => '?',
            'App\\Controller\\SecurityController::login' => '?',
            'App\\Controller\\SondagesController::delete' => '?',
            'App\\Controller\\SondagesController::edit' => '?',
            'App\\Controller\\SondagesController::index' => '?',
            'App\\Controller\\SondagesController::new' => '?',
            'App\\Controller\\SondagesController::show' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\RacineController:register' => '?',
            'App\\Controller\\SecurityController:login' => '?',
            'App\\Controller\\SondagesController:delete' => '?',
            'App\\Controller\\SondagesController:edit' => '?',
            'App\\Controller\\SondagesController:index' => '?',
            'App\\Controller\\SondagesController:new' => '?',
            'App\\Controller\\SondagesController:show' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
