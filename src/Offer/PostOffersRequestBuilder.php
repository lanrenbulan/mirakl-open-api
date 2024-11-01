<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\Context;

class PostOffersRequestBuilder extends AbstractRequestBuilder
{
    public function __construct(Context $context)
    {
        parent::__construct($context);

        $this->headers['Content-Type'] = 'application/json';
    }

    public function setOffers(array $offers): self
    {
        $this->bodyParams['offers'] = $offers;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers';
    }
}