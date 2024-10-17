<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class GetOfferRequestBuilder extends AbstractRequestBuilder
{
    private int $offerId;

    /**
     * @param int $offerId
     * @return $this
     */
    public function setOfferId(int $offerId): self
    {
        $this->offerId = $offerId;

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
        return '/api/offers/' . $this->offerId;
    }
}