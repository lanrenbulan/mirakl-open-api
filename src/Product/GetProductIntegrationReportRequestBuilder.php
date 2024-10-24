<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Product;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class GetProductIntegrationReportRequestBuilder extends AbstractRequestBuilder
{
    private int $importId;

    public function setImportId(int $importId): self
    {
        $this->importId = $importId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/products/imports/' . $this->importId . '/new_product_report';
    }
}