<?php

namespace Abounaja\Indipay\Facades;

use Illuminate\Support\Facades\Facade;

class Indipay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'indipay';
    }
}
