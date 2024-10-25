<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\PageTokenTrait;

class ListOfferPriceImportsRequestBuilder extends AbstractRequestBuilder
{
    use PageTokenTrait;

    /**
     * @param int $importId
     * @return $this
     */
    public function setImportId(int $importId): self
    {
        $this->queryParams['import_id'] = $importId;

        return $this;
    }

    /**
     * @param string $startDate
     * @return $this
     */
    public function setStartDate(string $startDate): static
    {
        $this->queryParams['start_date'] = $startDate;

        return $this;
    }

    /**
     * @param string $endDate
     * @return $this
     */
    public function setEndDate(string $endDate): static
    {
        $this->queryParams['end_date'] = $endDate;

        return $this;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): static
    {
        $this->queryParams['status'] = $status;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/pricing/imports';
    }
}