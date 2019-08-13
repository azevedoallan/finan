<?php
declare(strict_types=1);


namespace SONFin\Plugins;

use Psr\Container\ContainerInterface;
use SON\Auth\Auth;
use SONFin\ServiceContainerInterface;



class AuthPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('auth', function (ContainerInterface $container) {
            return new Auth();
        });
    }

}