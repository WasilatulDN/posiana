<?php

$di->set(
    'router',
    function () {
        $router = new \Phalcon\Mvc\Router(false);

        $router->mount(
            new IbuRoutes()
        );
        $router->mount(
            new PosyanduRoutes()
        );

        $router->mount(
            new KmsRoutes()
        );

        $router->addGet(
            '/',
            [
                'controller' => 'index',
                'action' => 'index'
            ]
        );

        $router->notFound([
            'controller' => 'index',
            'action' => 'show404'
        ]);

        return $router;
    }
);