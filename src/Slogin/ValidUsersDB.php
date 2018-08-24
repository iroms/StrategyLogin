<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 24.08.2018
 * Time: 19:07
 * Тестовый класс, содержащий логины, пароли и права пользователей
 * Предполагается, что в реальном приложении это будет храниться в БД/LDAP и т.д.
 */

namespace Iroms\Slogin;


class ValidUsersDB
{
    public $validUsersLocal = array(
        'admin'=>array(
            'password'=>'12345',
            'permissions'=>'1024',
        ),
        'user'=>array(
            'password'=>'67890',
            'permissions'=>'256',
        ),
        'guest'=>array(
            'password'=>'guest',
            'permissions'=>'2',
        ),
    );

    public $validUsersAD = array(
        'ivan.ivanov'=>array(
            'password'=>'qwerty',
            'permissions'=>'512',
        ),
        'pert.pertov'=>array(
            'password'=>'uiop',
            'permissions'=>'256',
        ),
        'sidor.sidorov'=>array(
            'password'=>'asdfg',
            'permissions'=>'128',
        ),
    );

    public $validUsersOpenID = array(
        'gosha'=>array(
            'password'=>'hjkl',
            'permissions'=>'512',
        ),
        'masha'=>array(
            'password'=>'zxcv',
            'permissions'=>'256',
        ),
        'misha'=>array(
            'password'=>'bnm',
            'permissions'=>'128',
        ),
    );
    
}