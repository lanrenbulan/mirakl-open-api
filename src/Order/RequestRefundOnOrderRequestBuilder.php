<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Order;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class RequestRefundOnOrderRequestBuilder extends AbstractRequestBuilder
{
    private string $orderId;

    protected string $method = 'PUT';

    /**
     *
     * TAX_INCLUDED, TAX_EXCLUDED
     *
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->bodyParams['amount'] = $amount;

        return $this;
    }

    public function setCurrencyCode(string $currencyCode): self
    {
        $this->bodyParams['currency_code'] = $currencyCode;

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options): self
    {
        $this->bodyParams['options'] = $options;

        return $this;
    }

    public function addOptions(array $option): self
    {
        if (!isset($this->bodyParams['options'])) {
            $this->bodyParams['options'] = [];
        }

        $this->bodyParams['options'][] = $option;

        return $this;
    }

    public function setReasonCode(string $reasonCode): self
    {
        $this->bodyParams['reason_code'] = $reasonCode;

        return $this;
    }

    /**
     * @param string $code
     * @param float $amount
     * @return $this
     */
    public function addTax(string $code, float $amount): self
    {
        if (!isset($this->bodyParams['taxes'])) {
            $this->bodyParams['taxes'] = [];
        }

        $this->bodyParams['taxes'][] = [
            'code' => $code,
            'amount' => $amount,
        ];

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/mms/orders/' . $this->orderId . '/refund';
    }
}