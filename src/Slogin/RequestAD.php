<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 23.08.2018
 * Time: 20:55
 * "Заглушка" авторизации пользователя в Active Directory
 */

namespace Iroms\Slogin;


class RequestAD implements OperationInterface
{

    public function autorizeUser(string $login, string $password)
    {

        $ValidUsersDB = new ValidUsersDB();
        $validUsers = $ValidUsersDB->validUsersAD;

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