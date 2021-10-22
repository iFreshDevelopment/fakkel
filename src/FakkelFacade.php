<?php

namespace ifresh\Fakkel;

use Illuminate\Support\Facades\Facade;

class FakkelFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fakkel';
    }
}
