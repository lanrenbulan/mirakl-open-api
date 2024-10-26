<?php

namespace Doubler\MiraklOpenApi\Incident;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class MarkIncidentResolvedRequestBuilder extends AbstractRequestBuilder
{
    private string $orderId;

    private string $line;

    protected string $method = 'PUT';

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

    /**
     * @param string $reasonCode
     * @return $this
     */
    public function setReasonCode(string $reasonCode): self
    {
        $this->bodyParams['reason_code'] = $reasonCode;

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