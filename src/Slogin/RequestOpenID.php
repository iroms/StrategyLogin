<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 23.08.2018
 * Time: 21:19
 * "Заглушка" авторизации пользователя через OpenID
 */

namespace Iroms\Slogin;


class RequestOpenID implements OperationInterface
{
    
    public function autorizeUser(string $login, string $password)
    {

        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersOpenID;

        if (!array_key_exists ($login, $validUsers))
        {
            return 0;
        }

        if ($validUsers[$login]['password'] !== $password)
        {
            return 0;
        }

        return $validUsers[$login]['permissions'];
    }
}