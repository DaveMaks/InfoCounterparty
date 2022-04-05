<?php

namespace InfoCounterparty\Compra\Method;


use Exception;
use InfoCounterparty\ApiMethodAbstract;

class GetIin extends ApiMethodAbstract
{

    public function __construct(&$apiToken, &$identifier, &$options = array())
    {
        parent::__construct($apiToken, $identifier, $options);
        $this->url = $this->options['baseurl'] . '?iin=' . $identifier . '&api-token=' . $this->apiToken;
    }

    function get($ret)
    {
        $ret = $this->request($this->url);
        if ($ret['http_code'] != 200 ||
            isset($ret['body']['message']))
            throw new Exception($ret['body']['message'], 100);
        return $ret['body'];
    }

    function SetCache(&$identifier, &$method, $data): bool
    {
        return true;
    }

    function GetCache(&$identifier, &$method): bool
    {
        return false;
    }
}