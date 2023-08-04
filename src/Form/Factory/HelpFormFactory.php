<?php
namespace Help\Form\Factory;

use Help\Form\HelpForm;
use Help\Model\HelpModel;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class HelpFormFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $form = new HelpForm();
        
        $adapter = $container->get('help-model-adapter');
        $model = new HelpModel($adapter);
        
        $form->setInputFilter($model->getInputFilter());
        return $form;
    }
}