<?php
namespace Help\Controller\Factory;

use Help\Controller\HelpController;
use Help\Form\HelpForm;
use Help\Model\HelpModel;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class HelpControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $controller = new HelpController();
        
        $adapter = $container->get('help-model-adapter');
        $controller->setDbAdapter($adapter);
        
        $model = new HelpModel($adapter);
        $controller->setModel($model);
        
        $form = $container->get('FormElementManager')->get(HelpForm::class);
        $controller->setForm($form);
        return $controller;
    }
}