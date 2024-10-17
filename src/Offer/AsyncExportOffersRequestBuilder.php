<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\Context;

class AsyncExportOffersRequestBuilder extends AbstractRequestBuilder
{
    protected string $method = 'POST';

    public function __construct(Context $context)
    {
        parent::__construct($context);

        $this->headers['Content-Type'] = 'application/json';
    }

    /**
     * @param string $reportType
     * @return $this
     */
    public function setExportType(string $reportType): self
    {
        $this->bodyParams['export_type'] = $reportType;

        return $this;
    }

    /**
     * @param string $lastRequestDate
     * @return $this
     */
    public function setLastRequestDate(string $lastRequestDate): self
    {
        $this->bodyParams['last_request_date'] = $lastRequestDate;

        return $this;
    }

    /**
     * @param array $includeFields
     * @return $this
     */
    public function setIncludeFields(array $includeFields): self
    {
        $this->bodyParams['include_fields'] = $includeFields;

        return $this;
    }

    /**
     * @param bool $includeInactiveOffers
     * @return $this
     */
    public function setIncludeInactiveOffers(bool $includeInactiveOffers): self
    {
        $this->bodyParams['include_inactive_offers'] = $includeInactiveOffers;

        return $this;
    }

    /**
     * @param int $itemsPerChunk
     * @return $this
     */
    public function setItemsPerChunk(int $itemsPerChunk): self
    {
        $this->bodyParams['items_per_chunk'] = $itemsPerChunk;

        return $this;
    }

    /**
     * @param int $megabytesPerChunk
     * @return $this
     */
    public function setMegabytesPerChunk(int $megabytesPerChunk): self
    {
        $this->bodyParams['megabytes_per_chunk'] = $megabytesPerChunk;

        return $this;
    }

    /**
     * @param array $renameFields
     * @return $this
     */
    public function setRenameFields(array $renameFields): self
    {
        $this->bodyParams['rename_fields'] = $renameFields;

        return $this;
    }

    /**
     * @param array $shippingZones
     * @return $this
     */
    public function setShippingZones(array $shippingZones): self
    {
        $this->bodyParams['shipping_zones'] = $shippingZones;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/export/async';
    }
}