<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\OffsetPageTrait;

class ListOffersRequestBuilder extends AbstractRequestBuilder
{
    use OffsetPageTrait;

    /**
     * @param string[] $offerStateCodes
     * @return $this
     */
    public function setOfferStateCodes(array $offerStateCodes): self
    {
        $this->queryParams['offer_state_codes'] = join(',', $offerStateCodes);

        return $this;
    }

    /**
     * @param string $sku
     * @return $this
     */
    public function setSku(string $sku): self
    {
        $this->queryParams['sku'] = $sku;

        return $this;
    }

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId(string $productId): self
    {
        $this->queryParams['product_id'] = $productId;

        return $this;
    }

    /**
     * @param bool $favorite
     * @return $this
     */
    public function setFavorite(bool $favorite): self
    {
        $this->queryParams['favorite'] = $favorite ? 'true' : 'false';

        return $this;
    }

    /**
     * @param string $pricingChannelCode
     * @return $this
     */
    public function setPricingChannelCode(string $pricingChannelCode): self
    {
        $this->queryParams['pricing_channel_code'] = $pricingChannelCode;

        return $this;
    }

    /**
     * @param string $pricingCustomerOrganizationId
     * @return $this
     */
    public function setPricingCustomerOrganizationId(string $pricingCustomerOrganizationId): self
    {
        $this->queryParams['pricing_customer_organization_id'] = $pricingCustomerOrganizationId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/offers';
    }
}