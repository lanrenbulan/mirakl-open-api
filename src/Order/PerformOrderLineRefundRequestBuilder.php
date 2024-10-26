<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Order;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\Context;

class PerformOrderLineRefundRequestBuilder extends AbstractRequestBuilder
{
    protected string $method = 'PUT';

    public function __construct(Context $context)
    {
        parent::__construct($context);

        $this->headers['Content-Type'] = 'application/json';
    }

    /**
     *
     * TAX_INCLUDED, TAX_EXCLUDED
     *
     * @param string $orderTaxMode
     * @return $this
     */
    public function setOrderTaxMode(string $orderTaxMode): self
    {
        $this->bodyParams['order_tax_mode'] = $orderTaxMode;

        return $this;
    }

    /**
     * @param array $refunds
     * @return $this
     */
    public function setRefunds(array $refunds): self
    {
        $this->bodyParams['refunds'] = $refunds;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/orders/refund';
    }
}