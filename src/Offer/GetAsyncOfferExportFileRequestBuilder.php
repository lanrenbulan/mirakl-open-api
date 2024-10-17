<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class GetAsyncOfferExportFileRequestBuilder extends AbstractRequestBuilder
{
    private string $trackingId;

    private int $index = 0;

    private string $fileType = 'json';

    /**
     * @param string $trackingId
     * @return $this
     */
    public function setTrackingId(string $trackingId): self
    {
        $this->trackingId = $trackingId;

        return $this;
    }

    /**
     * @param int $index
     * @return $this
     */
    public function setIndex(int $index): self
    {
        $this->index = $index;

        return $this;
    }

    /**
     * @param string $fileType
     * @return $this
     */
    public function setFileType(string $fileType): self
    {
        $this->fileType = $fileType;

        return $this;
    }

    protected function getApiPath(): string
    {
        return sprintf(
            '/api/offers/export/async/file/%s?file=of52-export/catch-prod/%s/%d.%s',
            $this->trackingId,
            $this->trackingId,
            $this->index,
            $this->fileType
        );
    }
}