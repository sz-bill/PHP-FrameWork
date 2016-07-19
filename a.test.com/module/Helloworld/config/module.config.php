<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Helloworld\Controller\Helloworld' => 'Helloworld\Controller\HelloworldController'
        )
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'helloworld' => array( // 路由名，尽量不要重复，路由在MVC里面，可以随便起。
                'type' => 'segment', // 服务名
                'options' => array( // 路由的配置
                    'route' => '/helloworld[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller' => 'Helloworld\Controller\Helloworld',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'helloworld' => __DIR__ . '/../view'
        )
    )
);