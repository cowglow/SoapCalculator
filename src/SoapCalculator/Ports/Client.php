<?php

namespace Cowglow\SoapCalculator\Ports;

use Cowglow\SoapCalculator\Infrastructure\AbstractPort;

/**
 * Class Client
 * @package Cowglow\SoapCalculator\Ports\Client
 */
class Client extends AbstractPort
{

    /**
     * Calculate
     *
     * @param $inputs
     * @param $operator
     *
     * @return string
     */
    public function Calculate($inputs, $operator): string
    {
        return parent::SoapRequest($inputs, $operator);
    }
}