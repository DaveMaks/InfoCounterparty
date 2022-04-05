<?php

namespace InfoCounterparty\Adata;

use InfoCounterparty\SourceInfoCounterpartyAbstract;

class AdataApi extends SourceInfoCounterpartyAbstract
{

    function Get($identifier, $method = 'all', $inCash = true)
    {
        echo 'AdataApi GET';
    }
}