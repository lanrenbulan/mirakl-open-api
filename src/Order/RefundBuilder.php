<?php

namespace Doubler\MiraklOpenApi\Order;

use InvalidArgumentException;

class RefundBuilder
{
    private array $data = [];

    /**
     * @param float $amount
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->data['amount'] = $amount;

        return $this;
    }

    /**
     * @param string $currencyIsoCode
     * @return $this
     */
    public function setCurrencyIsoCode(string $currencyIsoCode): self
    {
        $this->data['currency_iso_code'] = $currencyIsoCode;

        return $this;
    }

    /**
     * @param bool $excludedFromShipment
     * @return $this
     */
    public function setExcludedFromShipment(bool $excludedFromShipment): self
    {
        $this->data['excluded_from_shipment'] = $excludedFromShipment ? 'true' : 'false';

        return $this;
    }

    /**
     * @param string $code
     * @param float $amount
     * @return $this
     */
    public function addFee(string $code, float $amount): self
    {
        if (!isset($this->data['fees'])) {
            $this->data['fees'] = [];
        }

        $this->data['fees'][] = [
            'code' => $code,
            'amount' => $amount,
        ];

        return $this;
    }

    /**
     * @param string $orderLineId
     * @return $this
     */
    public function setOrderLineId(string $orderLineId): self
    {
        $this->data['order_line_id'] = $orderLineId;

        return $this;
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): self
    {
        if ($quantity <= 0) {
            throw new InvalidArgumentException(' Quantity is informative only.');
        }

        $this->data['quantity'] = $quantity;

        return $this;
    }

    /**
     * @param string $reasonCode
     * @return $this
     */
    public function setReasonCode(string $reasonCode): self
    {
        $this->data['reason_code'] = $reasonCode;

        return $this;
    }

    /**
     * @param string $shippingAmount
     * @return $this
     */
    public function setShippingAmount(string $shippingAmount): self
    {
        $this->data['shipping_amount'] = $shippingAmount;

        return $this;
    }

    /**
     * @param string $code
     * @param float $amount
     * @return $this
     */
    public function addShippingTax(string $code, float $amount): self
    {
        if (!isset($this->data['shipping_taxes'])) {
            $this->data['shipping_taxes'] = [];
        }

        $this->data['shipping_taxes'][] = [
            'code' => $code,
            'amount' => $amount,
        ];

        return $this;
    }

    /**
     * @param string $code
     * @param float $amount
     * @return $this
     */
    public function addTax(string $code, float $amount): self
    {
        if (!isset($this->data['taxes'])) {
            $this->data['taxes'] = [];
        }

        $this->data['taxes'][] = [
            'code' => $code,
            'amount' => $amount,
        ];

        return $this;
    }

    public function build(): array
    {
        return $this->data;
    }
}