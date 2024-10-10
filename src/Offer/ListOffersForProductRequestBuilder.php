<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\OffsetPageTrait;

class ListOffersForProductRequestBuilder extends AbstractRequestBuilder
{
    use OffsetPageTrait;

    /**
     * @param string[] $productIds
     * @return $this
     */
    public function setProductIds(array $productIds): self
    {
        $this->queryParams['product_ids'] = join(',', $productIds);

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/products/offers';
    }
}