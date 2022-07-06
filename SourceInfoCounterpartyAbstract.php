<?php

namespace InfoCounterparty;

abstract class SourceInfoCounterpartyAbstract
{
    var $apiToken = '';
    var $options = array();

    function __construct(string &$apiToken, &$options = array())
    {
        $this->apiToken = $apiToken;
        $this->options = $options;
    }

    /**
     * перевести параметр
     */
    protected function Translate($Param, $Path)
    {
        return $Param;
    }

    /**
     * @param $identifier string БИН юридического лица, по которому запрашивается информация
     * @param $method string название метода, по которому осуществляется запрос
     * @param $inCash bool Разрешить запрос из кеша, в противном случае перезаростить из внешней системы
     *
     * @return array|bool Возвращает массив со значениями в зависимости от метода. в случае $method='all',
     * ответ будет упакован в дополнительный массив, где ключ массива это метод
     *
     */
    abstract function Get(string &$identifier, &$method = array(), bool &$inCash = true);

    /**
     * Получить список доступных методов с описанием
     * @return array массив где ключ имя метода
     * ['basic' =>[
     *      'title' => string 'Краткая информация',
     *      'description' => string '"Регистрационные данные" предназначен для получения базовой информации ЮЛ или ФЛ (если это ИП)',
     * ]
     * 'licenses' =>[
     *      'title' => string 'Лицензии',
     *      'description' => string '"Лицензии" предназначен для получения списка лицензии организации',
     * ]
     * 'tax-debts' =>[
     *      'title' => string 'Налоговые задолженности',
     *      'description' => string '"Налоговая задолженность" позволяет получить информацию о наловой задолженности объекта поиска'
     * ],
     * ...
     *]
     *
     */
    abstract function GetListMethod();

}
