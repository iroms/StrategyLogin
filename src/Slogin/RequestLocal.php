<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 23.08.2018
 * Time: 21:23
 * "Заглушка" локальной авторизации пользователя
 */

namespace Iroms\Slogin;


class RequestLocal implements OperationInterface
{

    public function authorizeUser(string $login, string $password)
    {

        $login = strtolower($login);
    
        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersLocal;

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