<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class ExportOffersRequestBuilder extends AbstractRequestBuilder
{
    protected function getApiPath(): string
    {
        return '/api/offers/export';
    }
}