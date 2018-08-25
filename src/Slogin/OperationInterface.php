<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 23.08.2018
 * Time: 20:53
 */

namespace Iroms\Slogin;


interface OperationInterface
{
    public function authorizeUser(string $login, string $password);
}