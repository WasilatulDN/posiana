<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class IbuRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'ibu',
        ]);

        $this->setPrefix('/ibu');

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
            '/lihatAnak',
            [
                'action' => 'lihatAnak',
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
            '/list-anak',
            [
                'action' => 'listAnak',
            ]
        );

        $this->addGet(
            '/add-anak',
            [
                'action' => 'addAnak',
            ]
        );

        $this->addPost(
            '/storeanak',
            [
                'action' => 'storeAnak',
            ]
        );

        $this->addGet(
            '/hapus-anak/{idp}',
            [
                'action' => 'hapusAnak',
            ]
        );

        $this->addGet(
            '/detail-kms/{idp}',
            [
                'action' => 'detailKms',
            ]
        );

        
    }
}