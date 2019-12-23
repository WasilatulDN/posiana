<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class PosyanduRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'posyandu',
        ]);

        $this->setPrefix('/posyandu');

        $this->addGet(
            '/register',
            [
                'action' => 'create',
            ]
        );

        $this->addPost(
            '/register',
            [
                'action' => 'store',
            ]
        );
  
        $this->addGet(
            '/login',
            [
                'action' => 'login',
            ]
        );

        $this->addPost(
            '/login',
            [
                'action' => 'storelogin',
            ]
        );

        $this->addGet(
            '/home',
            [
                'action' => 'home',
            ]
        );

        $this->addGet(
            '/list-kms',
            [
                'action' => 'listKMS',
            ]
        );

        $this->addGet(
            '/logout',
            [
                'action' => 'logout',
            ]
        );

        $this->addGet(
            '/list-peserta',
            [
                'action' => 'listPeserta',
            ]
        );

        $this->addPost(
            '/list-peserta',
            [
                'action' => 'searchResult',
            ]
        );

        $this->addGet(
            '/list-anak',
            [
                'action' => 'listAnak',
            ]
        );
    }
}