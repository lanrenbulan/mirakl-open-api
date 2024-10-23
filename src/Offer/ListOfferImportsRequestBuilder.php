<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\PageTokenTrait;

class ListOfferImportsRequestBuilder extends AbstractRequestBuilder
{
    use PageTokenTrait;

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

    /**
     * @param string $model
     * @return $this
     */
    public function setModel(string $model): static
    {
        $this->queryParams['model'] = $model;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/imports';
    }
}