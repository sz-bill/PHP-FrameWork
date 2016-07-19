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
            'helloworld' => array( // ·������������Ҫ�ظ���·����MVC���棬���������
                'type' => 'segment', // ������
                'options' => array( // ·�ɵ�����
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