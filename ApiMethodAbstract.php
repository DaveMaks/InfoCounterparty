<?php

namespace InfoCounterparty;

use Exception;

abstract class ApiMethodAbstract
{
    var $apiToken;
    var $identifier;
    var $options;
    var $url = '';
    var $useCache = true;
    var $methode = '';

    var $curl_option = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '*',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_HEADER => false,
        CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    ];

    function __construct(&$apiToken,
                         &$identifier,
                         string $methode = null,
                         &$options = array())
    {
        $this->apiToken = $apiToken;
        $this->identifier = $identifier;
        $this->methode = $methode;
        $this->options = $options;
    }

    function getInfo()
    {
        $reqest = $this->get($this->before());
        $this->after();
        return $reqest;
    }

    abstract function get($values);


    /**
     * Выполняет запрос на сторонний ресурс
     * @param string $url
     * @param string $httpMethod метод выполения GET | POST
     * @param array $data
     * @return array|false
     */
    protected function request(string $url, string $httpMethod = 'GET', $data = [])
    {

        $response = [
            'http_code' => 0,
            'body' => null
        ];
        $curl = curl_init();
        curl_setopt_array($curl, $this->curl_option);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $httpMethod);

        if ($httpMethod == 'POST') {
            curl_setopt($curl, CURLOPT_POST, 'POST');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        $body = curl_exec($curl);
        $response['body'] = json_decode($body, true);
        $response['body']['lastupdate'] = time();
        if (json_last_error() != JSON_ERROR_NONE) {
            $response['body'] = $body;
        }
        $info = curl_getinfo($curl);
        if (curl_error($curl)) {
            throw new Exception(curl_error($curl) . " \n\rInfo:" . print_r($info, true));
            return false;
        }
        curl_close($curl);
        $response['http_code'] = $info['http_code'];

        return $response;
    }


    abstract function SetCache(&$identifier, &$method, $data): bool;

    abstract function GetCache(&$identifier, &$method);

    /**
     * Выполнить до
     */
    protected function before()
    {

    }

    /**
     * Выполнить После
     */
    protected function after()
    {

    }
}
