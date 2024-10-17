<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class GetAsyncOfferExportStatusRequestBuilder extends AbstractRequestBuilder
{
    private string $trackingId;

    /**
     * @param string $trackingId
     * @return $this
     */
    public function setTrackingId(string $trackingId): self
    {
        $this->trackingId = $trackingId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/export/async/status/' . $this->trackingId;
    }
}