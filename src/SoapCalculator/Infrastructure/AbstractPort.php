<?php

namespace Cowglow\SoapCalculator\Infrastructure;

/**
 * Class AbstractPort
 *
 * @package Cowglow\SoapCalculator\Infrastructure
 */
class AbstractPort
{
    /**
     * @var string $wsdl
     */
    protected $wsdl;

    /**
     * AbstractPort constructor.
     *
     * @param $wsdl
     */
    public function __construct($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    /**
     * Soap Request
     *
     * @param $inputs
     * @param $operator
     *
     * @return string
     */
    protected function SoapRequest($inputs, $operator): string
    {
        $soapClient = new \SoapClient($this->wsdl);
        $input = [
            'intA' => $inputs[0],
            'intB' => $inputs[1]
        ];

        switch ($operator) {
            case '+':
                $response = $soapClient->Add($input);

                return $response->AddResult;
                break;
            case '-':
                $response = $soapClient->Subtract($input);

                return $response->SubtractResult;
                break;
            case '*':
                $response = $soapClient->Multiply($input);

                return $response->MultiplyResult;
                break;
            case '/':
                $response = $soapClient->Divide($input);

                return $response->DivideResult;
                break;
        }
    }
}