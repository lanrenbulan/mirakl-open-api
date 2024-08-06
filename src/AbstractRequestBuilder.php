<?php
/**
 * This file is part of doubler.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 */

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

    public function setShopId(string $shopId): self
    {
        $this->queryParams['shop_id'] = $shopId;

        return $this;
    }

    protected function getGatewayUri(): string
    {
        return $this->context->getGatewayUri();
    }
}