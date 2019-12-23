<?php

use Phalcon\Mvc\Router\Group as RouterGroup;

class KmsRoutes extends RouterGroup
{
    public function initialize()
    {
        $this->setPaths([
            'controller' => 'kms',
        ]);

        $this->setPrefix('/kms');

        $this->addGet(
            '/list-ibu',
            [
                'action' => 'listIbu',
            ]
        );

        $this->addGet(
            '/list-anak',
            [
                'action' => 'listAnak',
            ]
        );

        $this->addGet(
            '/ibu/{idp}',
            [
                'action' => 'createIbu',
            ]
        );

        $this->addPost(
            '/storekmsibu',
            [
                'action' => 'storeIbu',
            ]
        );

        $this->addGet(
            '/anak/{idp}',
            [
                'action' => 'createAnak',
            ]
        );

        $this->addPost(
            '/storekmsanak',
            [
                'action' => 'storeAnak',
            ]
        );

        $this->addGet(
            '/list-kms',
            [
                'action' => 'listKms',
            ]
        );

        $this->addGet(
            '/daftar-kms',
            [
                'action' => 'daftarKms',
            ]
        );

        $this->addGet(
            '/detail-kms/{idp}',
            [
                'action' => 'detailKms',
            ]
        );

        $this->addGet(
            '/hapus-kms/{idp}',
            [
                'action' => 'hapusKms',
            ]
        );

    }
}