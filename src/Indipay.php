<?php
namespace Abounaja\Indipay;

use Abounaja\Indipay\Gateways\CCAvenueGateway;
use Abounaja\Indipay\Gateways\CitrusGateway;
use Abounaja\Indipay\Gateways\EBSGateway;
use Abounaja\Indipay\Gateways\InstaMojoGateway;
use Abounaja\Indipay\Gateways\PaymentGatewayInterface;
use Abounaja\Indipay\Gateways\PayUMoneyGateway;
use Abounaja\Indipay\Gateways\MockerGateway;
use Abounaja\Indipay\Gateways\ZapakPayGateway;

class Indipay
{

    protected $gateway;

    /**
     * @param PaymentGatewayInterface $gateway
     */
    function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function purchase($parameters = array())
    {

        return $this->gateway->request($parameters)->send();

    }

    public function response($request)
    {
        return $this->gateway->response($request);
    }

    public function prepare($parameters = array())
    {
        return $this->gateway->request($parameters);
    }

    public function verify($parameters = array())
    {
        return $this->gateway->verify($parameters);
    }

    public function process($order)
    {
        return $order->send();
    }

    public function gateway($name)
    {
        $name = strtolower($name);
        switch ($name) {
            case 'ccavenue':
                $this->gateway = new CCAvenueGateway();
                break;

            case 'payumoney':
                $this->gateway = new PayUMoneyGateway();
                break;

            case 'ebs':
                $this->gateway = new EBSGateway();
                break;

            case 'citrus':
                $this->gateway = new CitrusGateway();
                break;

            case 'instamojo':
                $this->gateway = new InstaMojoGateway();
                break;

            case 'mocker':
                $this->gateway = new MockerGateway();
                break;

            case 'zapakpay':
                $this->gateway = new ZapakPayGateway();
                break;

        }

        return $this;
    }



}