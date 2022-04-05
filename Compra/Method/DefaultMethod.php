<?php

namespace InfoCounterparty\Compra\Method;


use Exception;
use InfoCounterparty\ApiMethodAbstract;

define('PATH_CACHE', dirname(__FILE__) . '/../../cache');

class DefaultMethod extends ApiMethodAbstract
{
    private $cacheFile;

    public function __construct(&$apiToken, &$identifier, $methode, &$options = array())
    {
        parent::__construct($apiToken, $identifier, $methode, $options);
        $this->url = $this->options['baseurl'] . '?identifier=' . $identifier . '&api-token=' . $this->apiToken;
        $this->cacheFile = PATH_CACHE . '/' . $identifier . '-' . $this->methode . '.txt';
    }

    function get($ret)
    {
        if ($this->useCache)
            $data = $this->GetCache($this->identifier, $this->methode);
        if (isset($data['body']))
            return $data['body'];
        $ret = $this->request($this->url);
        if ($ret['http_code'] != 200 ||
            isset($ret['body']['message']))
            throw new Exception($ret['body']['message'], 100);
        if ($ret['body'] != null)
            $this->SetCache($this->identifier, $this->methode, $ret);
        ///TODO добавить логирование
        return $ret['body'];
    }

    function SetCache(&$identifier, &$method, $data = array()): bool
    {
        ///TODO Переделать хранение кеша
        return (bool)@file_put_contents($this->cacheFile, json_encode($data));
    }

    function GetCache(&$identifier, &$method)
    {
        ///TODO Переделать хранение кеша
        if (!file_exists($this->cacheFile))
            return false;
        return json_decode(file_get_contents($this->cacheFile), true);
    }
}