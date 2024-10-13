<?php

namespace Technopek\LormeIspum\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Technopek\LormeIspum\LormeIspum
 */
class LormeIspum extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Technopek\LormeIspum\LormeIspum::class;
    }
}
