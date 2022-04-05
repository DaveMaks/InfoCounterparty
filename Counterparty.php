<?php

namespace InfoCounterparty;

use InfoCounterparty\Adata\AdataApi;
use InfoCounterparty\Compra\CompraApi;

define('SOURCE_COMPRA', CompraApi::class);
define('SOURCE_ADATA', AdataApi::class);

/**
 * Фасад для запроса информации о контрагенте
 */
class Counterparty
{
    private $sourceInfo;

    /**
     * @param null $source SourceInfoCounterpartyAbstract
     * @param string $token Токен для доступа с ресурсу
     */
    function __construct($source = null, $token = '')
    {
        if ($source == null)
            $source = SOURCE_COMPRA;

        try {
            $this->sourceInfo = new $source($token);
        } catch (\Exception $ex) {
            var_dump($ex->getMessage());
        }

    }

    /**
     * Запрос данных о контрагенте
     * @param $identifier string БИН юридического лица, по которому запрашивается информация
     * @param $method string | array название метода, по которому осуществляется запрос
     * @param $inCash bool Разрешить запрос из кеша, в противном случае перезаростить из внешней системы
     *
     * @return array Возвращает массив со значениями в зависимости от метода. в случае $method=array,
     * ответ будет упакован в дополнительный массив, где ключ массива это метод
     *
     */
    function Get($identifier, $method = array(), $inCash = true)
    {
        return $this->sourceInfo->Get($identifier, $method, $inCash);
    }

    function getSourceObject(): SourceInfoCounterpartyAbstract
    {
        return $this->sourceInfo;
    }

}