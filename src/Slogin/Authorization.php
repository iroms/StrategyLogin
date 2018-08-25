<?php
/**
 * Created by PhpStorm.
 * User: Roman
 * Date: 23.08.2018
 * Time: 18:50
 * Авторизация пользователей в некую систему
 * Пользователь может авторизоваться разными способами
 * (для примера: локальное хранилище, домен ActiveDirectory и OpenID
 * Для каждого типа авторизации выбирается своя стратегия
 * Функция авторизации возвращает условное положительное число, определяющее права пользователя
 * или ноль в случае неудачной авторизации
 */

namespace Iroms\Slogin;


class Authorization
{
    private $strategy;

    public function __construct(string $type)
    {
        $this->strategy = $this->getStrategy($type);
    }

    private function getStrategy(string $type): OperationInterface
    {
        $type = strtolower($type);
        switch ($type)
        {
            case 'ad'     : return new RequestAD;
            case 'openid' : return new RequestOpenID;
            case 'local'  : return new RequestLocal;
            default       : throw new \Exception('unknown autorize method');
        }
    }

    public function authorizeUser(string $login, string $password)
    {
        return $this->strategy->authorizeUser($login, $password);
    }

}

