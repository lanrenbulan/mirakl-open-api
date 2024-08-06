<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi;

use Doubler\OpenApiSdk\RequestBuilderTrait;

abstract class AbstractRequestBuilder
{
    use RequestBuilderTrait;

    protected Context $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    protected function getGatewayUri(): string
    {
        return $this->context->getGatewayUri();
    }

    public function setShopId(string $shopId): self
    {
        $this->queryParams['shop_id'] = $shopId;

        return $this;
    }

    protected function beforeBuildRequest(): void
    {
        $this->headers['Authorization'] = $this->context->getApiKey();
    }
}