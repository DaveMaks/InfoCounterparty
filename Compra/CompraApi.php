<?php

namespace InfoCounterparty\Compra;

use InfoCounterparty\ApiMethodAbstract;
use InfoCounterparty\SourceInfoCounterpartyAbstract;

class CompraApi extends SourceInfoCounterpartyAbstract
{
    private static $ListMethod = array();

    private static $MessageDescription = [
        "not-found" => 'БИН/ИИН не найден',
        "incorrect_format" => 'Некорректный формат БИН/ИИН',
        "token-not-found" => 'Некорректный токен',
        "token-not-provided" => 'Токен не указан в запросе',
        "expired-or-too-early" => 'Срок действия токена истек',
        "Исчерпано количество запросов" => 'reached-limit',
        "Нет прав доступа на запрашиваемый ресурс" => 'requested-path-not-allowed',
    ];

    function __construct(string $apiToken, $options = array())
    {
        parent::__construct($apiToken, $options);
        self::$ListMethod = include(__DIR__ . '/ListMethods.php');
    }

    function Get(string &$identifier, &$method = array(), &$inCash = true)
    {
        if (empty($method))
            return false;
        try {
            if (is_array($method)) {
                $ret = [];
                foreach ($method as $met => $value) {
                    $ret[$met] = $this->Get($identifier, $met, $inCash);
                }
                return $ret;
            }
            if (is_string($method) &&
                array_key_exists($method, self::$ListMethod)) {
                /** @var $info ApiMethodAbstract */
                if (!class_exists(self::$ListMethod[$method]['class']))
                    throw new \Exception("Метод '{$method}' не реализован");
                $info = new self::$ListMethod[$method]['class'](
                    $this->apiToken,
                    $identifier,
                    $method,
                    self::$ListMethod[$method]);
                $info->useCache = $inCash;
                return $info->getInfo();;
            }
        } catch (\Exception $ex) {
            $msg = $ex->getMessage();
            if ($ex->getCode() == 100 && isset(self::$MessageDescription[$ex->getMessage()])) {
                $msg = self::$MessageDescription[$ex->getMessage()];
            }
            echo 'ERROR -> ' . $msg;
            return false;
        }
    }

    function GetListMethod()
    {
        if (!is_array(self::$ListMethod) || empty(self::$ListMethod))
            return false;
        $ret = array();
        foreach (self::$ListMethod as $key => $item) {
            $ret[$key]['title'] = $item['name'];
            $ret[$key]['description'] = $item['title'];
        }
        return $ret;

    }
}
