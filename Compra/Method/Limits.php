<?php

namespace InfoCounterparty\Compra\Method;

use Exception;
use InfoCounterparty\ApiMethodAbstract;

class Limits extends ApiMethodAbstract
{
    public function __construct(&$apiToken, &$identifier, &$options = array())
    {
        parent::__construct($apiToken, $identifier, $options);
        $this->url = $this->options['baseurl'] . '?api-token=' . $this->apiToken;
    }

    function get($value = [])
    {
        $ret = $this->request($this->url);
        if ($ret['http_code'] != 200 || empty($ret['body']))
            throw new Exception(print_r($ret, true));
        return $ret['body'];
    }

    function SetCache(&$identifier, &$method, $data): bool
    {
        return true;
    }

    function GetCache(&$identifier, &$method)
    {
        return null;
    }
}