<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Product;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class ListProductImportsRequestBuilder extends AbstractRequestBuilder
{
    /**
     * @param string $lastRequestDate
     * @return $this
     */
    public function setTrackingId(string $lastRequestDate): static
    {
        $this->queryParams['last_request_date'] = $lastRequestDate;

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
     * @param bool $hasTransformedFile
     * @return $this
     */
    public function setHasTransformedFile(bool $hasTransformedFile): static
    {
        $this->queryParams['has_transformed_file'] = $hasTransformedFile ? 'true' : 'false';

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/products/imports';
    }
}