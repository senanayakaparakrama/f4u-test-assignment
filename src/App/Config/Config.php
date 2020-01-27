<?php
namespace App\Config;

/**
 * Class Config
 * @package App\Config
 */
class Config
{
    const BASE_URL = '/';
     //Application route constants
    const ROUTES = [
        'test' =>
            [
                'controller' => 'MainController',
                'method' => 'GET'
            ]
    ];


}