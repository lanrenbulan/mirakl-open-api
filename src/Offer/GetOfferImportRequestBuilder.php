<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class GetOfferImportRequestBuilder extends AbstractRequestBuilder
{
    private int $importId;

    public function setImportId(int $importId): self
    {
        $this->importId = $importId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/imports/' . $this->importId;
    }
}