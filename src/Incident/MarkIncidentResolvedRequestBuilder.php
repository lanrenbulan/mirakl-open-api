<?php

namespace Doubler\MiraklOpenApi\Incident;

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
        return sprintf(
            '/api/orders/%s/lines/%s/resolve_incident',
            $this->orderId,
            $this->line,
        );
    }
}