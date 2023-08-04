<?php
namespace Help\Controller\Factory;

use Help\Controller\HelpConfigController;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class HelpConfigControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $controller = new HelpConfigController();
        $adapter = $container->get('help-model-adapter');
        $controller->setDbAdapter($adapter);
        return $controller;
    }
}