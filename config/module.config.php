<?php
namespace Help;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'help' => [
                'type' => Literal::class,
                'priority' => 1,
                'options' => [
                    'route' => '/help',
                    'defaults' => [
                        'action' => 'index',
                        'controller' => Controller\HelpController::class,
                    ]
                ],
                'may_terminate' => FALSE,
                'child_routes' => [
                    'config' => [
                        'type' => Segment::class,
                        'priority' => 100,
                        'options' => [
                            'route' => '/config[/:action]',
                            'defaults' => [
                                'action' => 'index',
                                'controller' => Controller\HelpConfigController::class,
                            ],
                        ],
                    ],
                    'default' => [
                        'type' => Segment::class,
                        'priority' => -100,
                        'options' => [
                            'route' => '/[:action[/:uuid]]',
                            'defaults' => [
                                'action' => 'index',
                                'controller' => Controller\HelpController::class,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'acl' => [
        'guest' => [
            
        ],
        'admin' => [
            'help/default' => ['index','create','update','delete','find','menu'],
            'help/config' => ['index','clear','create'],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\HelpController::class => Controller\Factory\HelpControllerFactory::class,
            Controller\HelpConfigController::class => Controller\Factory\HelpConfigControllerFactory::class,
        ],
    ],
    'form_elements' => [
        'factories' => [
            Form\HelpForm::class => Form\Factory\HelpFormFactory::class,
        ],
    ],
    'navigation' => [
        'default' => [
            'help' => [
                'label' => 'Help',
                'route' => 'help/default',
                'class' => 'dropdown',
                'resource' => 'help/default',
                'privilege' => 'index',
                'pages' => [
                    [
                        'label' => 'Add Help',
                        'route' => 'help/default',
                        'action' => 'create',
                        'controller' => 'help',
                        'resource' => 'help/default',
                        'privilege' => 'create',
                    ],
                    [
                        'label' => 'List Help',
                        'route' => 'help/default',
                        'action' => 'index',
                        'controller' => 'help',
                        'resource' => 'help/default',
                        'privilege' => 'index',
                    ],
                ],
            ],
            'settings' => [
                'pages' => [
                    'help' => [
                        'label' => 'Help Settings',
                        'route' => 'help/config',
                        'action' => 'index',
                        'resource' => 'help/config',
                        'privilege' => 'index',
                    ],
                ],
            ],
        ],
        
    ],
    'service_manager' => [
        'aliases' => [
            'help-model-adapter-config' => 'model-adapter-config',
        ],
        'factories' => [
            'help-model-adapter' => Service\Factory\HelpModelAdapterFactory::class,
        ],
    ],
    'view_helpers' => [
        'factories' => [
            View\Helper\Help::class => InvokableFactory::class,
        ],
        'aliases' => [
            'help' => View\Helper\Help::class,
        ],
    ],
    'view_manager' => [],
];