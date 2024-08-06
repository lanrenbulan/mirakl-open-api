<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Order;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class MarkIncidentResolvedRequestBuilder extends AbstractRequestBuilder
{
    private string $orderId;

    private string $line;

    /**
     * @param string $orderId
     * @return $this
     */
    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @param string $line
     * @return $this
     */
    public function setLine(string $line): self
    {
        $this->line = $line;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/orders/' . $this->orderId . '/lines/' . $this->line .'/resolve_incident';
    }
}