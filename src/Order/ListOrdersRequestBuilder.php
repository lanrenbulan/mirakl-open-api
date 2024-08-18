<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Order;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\PageTrait;

class ListOrdersRequestBuilder extends AbstractRequestBuilder
{
    use PageTrait;

    /**
     * @param string[] $orderIds
     * @return $this
     */
    public function setOrderIds(array $orderIds): self
    {
        $this->queryParams['order_ids'] = join(',', $orderIds);

        return $this;
    }

    /**
     * @param string[] $orderReferencesForCustomer
     * @return $this
     */
    public function setOrderReferencesForCustomer(array $orderReferencesForCustomer): self
    {
        $this->queryParams['order_references_for_customer'] = join(',', $orderReferencesForCustomer);

        return $this;
    }

    /**
     * @param string[] $orderReferencesForSeller
     * @return $this
     */
    public function setOrderReferencesForSeller(array $orderReferencesForSeller): self
    {
        $this->queryParams['order_references_for_seller'] = join(',', $orderReferencesForSeller);

        return $this;
    }

    /**
     *
     * STAGING, WAITING_ACCEPTANCE, WAITING_DEBIT, WAITING_DEBIT_PAYMENT
     * SHIPPING, SHIPPED, TO_COLLECT, RECEIVED, CLOSED, REFUSED, CANCELED
     *
     * @param string[] $orderStateCodes
     * @return $this
     */
    public function setOrderStateCodes(array $orderStateCodes): self
    {
        $this->queryParams['order_state_codes'] = join(',', $orderStateCodes);

        return $this;
    }

    /**
     * @param string[] $channelCodes
     * @return $this
     */
    public function setChannelCodes(array $channelCodes): self
    {
        $this->queryParams['channel_codes'] = join(',', $channelCodes);

        return $this;
    }

    /**
     * Return only orders without channel. If true, ignore the channel_codes
     *
     * @param bool $onlyNullChannel
     * @return $this
     */
    public function setOnlyNullChannel(bool $onlyNullChannel): self
    {
        $this->queryParams['only_null_channel'] = $onlyNullChannel ? 'true' : 'false';

        return $this;
    }

    /**
     * @param string $startCreateDate
     * @return $this
     */
    public function setStartCreateDate(string $startCreateDate): self
    {
        $this->queryParams['start_date'] = $startCreateDate;

        return $this;
    }

    /**
     * @param string $endCreateDate
     * @return $this
     */
    public function setEndCreateDate(string $endCreateDate): self
    {
        $this->queryParams['end_date'] = $endCreateDate;

        return $this;
    }

    /**
     * @param string $startCreateDate
     * @param string $endCreateDate
     * @return $this
     */
    public function setCreateDate(string $startCreateDate, string $endCreateDate): self
    {
        $this->setStartCreateDate($startCreateDate);

        $this->setStartCreateDate($endCreateDate);

        return $this;
    }

    /**
     * @param string $startUpdateDate
     * @return $this
     */
    public function setStartUpdateDate(string $startUpdateDate): self
    {
        $this->queryParams['start_update_date'] = $startUpdateDate;

        return $this;
    }

    /**
     * @param string $endUpdateDate
     * @return $this
     */
    public function setEndUpdateDate(string $endUpdateDate): self
    {
        $this->queryParams['end_update_date'] = $endUpdateDate;

        return $this;
    }

    /**
     * @param string $startDate
     * @param string $endDate
     * @return $this
     */
    public function setUpdateDate(string $startDate, string $endDate): self
    {
        $this->setStartUpdateDate($startDate);

        $this->setEndUpdateDate($endDate);

        return $this;
    }

    /**
     * @param bool $customerDebited
     * @return $this
     */
    public function setCustomerDebited(bool $customerDebited): self
    {
        $this->queryParams['customer_debited'] = $customerDebited ? 'true' : 'false';

        return $this;
    }

    /**
     * Payment workflow of an order
     *
     * PAY_ON_ACCEPTANCE, PAY_ON_DELIVERY, PAY_ON_DUE_DATE
     * PAY_ON_SHIPMENT, NO_CUSTOMER_PAYMENT_CONFIRMATION
     *
     * @param string $paymentWorkflow
     * @return $this
     */
    public function setPaymentWorkflow(string $paymentWorkflow): self
    {
        $this->queryParams['payment_workflow'] = $paymentWorkflow;

        return $this;
    }

    /**
     * @param bool $hasIncident
     * @return $this
     */
    public function setHasIncident(bool $hasIncident): self
    {
        $this->queryParams['has_incident'] = $hasIncident ? 'true' : 'false';

        return $this;
    }

    /**
     * @param string[] $fulfillmentCenterCode
     * @return $this
     */
    public function setFulfillmentCenterCode(array $fulfillmentCenterCode): self
    {
        $this->queryParams['fulfillment_center_code'] = $fulfillmentCenterCode;

        return $this;
    }

    /**
     *
     * TAX_EXCLUDED TAX_INCLUDED
     *
     * @param string $orderTaxMode
     * @return $this
     */
    public function setOrderTaxMode(string $orderTaxMode): self
    {
        $this->queryParams['order_tax_mode'] = $orderTaxMode;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads';
    }

    /**
     * @param array $params
     * @return string
     */
    protected function getQueryStr(): string
    {
        $fulfillmentCenterCodes = $this->queryParams['fulfillment_center_code'] ?? [];

        unset($this->queryParams['fulfillment_center_code']);

        $strings[] = http_build_query($this->queryParams, '', '&');

        foreach ($fulfillmentCenterCodes as $fulfillmentCenterCode) {
            $strings[] = 'fulfillment_center_code=' . $fulfillmentCenterCode;
        }

        return join('&', $strings);
    }
}