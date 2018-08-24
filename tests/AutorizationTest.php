<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 24.08.2018
 * Time: 0:00
 * Тест получает одно случайное значение логина/пароля/прав пользователя,
 * и сравнивает его с результатом авторизации.
 * Также делаются попытки модифицировать пароль (добавление пробела),
 * модифицировать логин (добавление пробела), войти с пустым паролем.
 * Предполагается, что пустой пароль не допускается,
 * Иначе требуется модифицировать тест.
 */

use PHPUnit\Framework\TestCase;
use \Iroms\Slogin\Authorization;
use \Iroms\Slogin\ValidUsersDB;



final class AutorizationTest extends TestCase
{

    public function testAuthorizationAD(): void
    {
        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersAD;

        $login = array_rand($validUsers);

        $password    = $validUsers[$login]['password'];
        $permissions = $validUsers[$login]['permissions'];

        $AuthorizationAD = new Authorization('AD');

        $this->assertEquals(
            $permissions,
            $AuthorizationAD->autorizeUser($login, $password)
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, $password . ' ')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, '')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login . ' ', $password)
        );
    }

    public function testAuthorizationOpenID(): void
    {
        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersOpenID;

        $login = array_rand($validUsers);

        $password    = $validUsers[$login]['password'];
        $permissions = $validUsers[$login]['permissions'];

        $AuthorizationAD = new Authorization('openID');

        $this->assertEquals(
            $permissions,
            $AuthorizationAD->autorizeUser($login, $password)
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, $password . ' ')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, '')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login . ' ', $password)
        );

    }

    public function testAuthorizationLocal(): void
    {
        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersLocal;

        $login = array_rand($validUsers);

        $password    = $validUsers[$login]['password'];
        $permissions = $validUsers[$login]['permissions'];

        $AuthorizationAD = new Authorization('local');

        $this->assertEquals(
            $permissions,
            $AuthorizationAD->autorizeUser($login, $password)
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, $password . ' ')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login, '')
        );
        
        $this->assertEquals(
            0,
            $AuthorizationAD->autorizeUser($login . ' ', $password)
        );
    }
    
}