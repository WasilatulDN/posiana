<?php

// namespace Phalcon\Init\Dashboard\Controllers\Validation;

use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Regex;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\File as FileValidator;

class IbuValidation extends Validation
{
    public function initialize(){

    $this->add(
        'username',
        new PresenceOf(
            [
                'message' => 'The username is required',
            ]
        )
    );

    // $this->add(
    //     'username',
    //     new Regex(
    //         [
    //             'pattern' => '/(?=.*[a-z])/',
    //             'message' => 'The username must consist of A-Z a-z',
    //         ]
    //     )

    // );

    $this->add(
        'username',
        new StringLength([
            'max' => 20,
            'min' => 5
        ])
    );

    $this->add(
        'nama',
        new PresenceOf(
            [
                'message' => 'The nama is required',
            ]
        )
    );


    $this->add(
        'password',
        new PresenceOf(
            [
                'message' => 'The password is required',
            ]
        )
    );

    // $this->add(
    //     'password',
    //     new Regex(
    //         [
    //             'pattern' => '/{8,}/',
    //             'message' => 'Password must contains at least 8 character',
    //         ]
    //     )
    // );

    $this->add(
        'email',
        new Email(
            [
                'message' => 'email must follow email format',
            ]
        )
    );


    }
}

?>