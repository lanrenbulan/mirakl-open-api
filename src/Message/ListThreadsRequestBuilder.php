<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\PageTokenTrait;

class ListThreadsRequestBuilder extends AbstractRequestBuilder
{
    use PageTokenTrait;

    /**
     * @param string $entityType MMP_ORDER, MMP_OFFER, MPS_ORDER, MPS_SERVICE, SELLER_OPERATOR
     * @return $this
     */
    public function setEntityType(string $entityType): self
    {
        $this->queryParams['entity_type'] = $entityType;

        return $this;
    }

    /**
     * @param string $entityId
     * @return $this
     */
    public function setEntityId(string $entityId): self
    {
        $this->queryParams['entity_id'] = $entityId;

        return $this;
    }

    /**
     * @param string $updatedSince
     * @return $this
     */
    public function setUpdatedSince(string $updatedSince): self
    {
        $this->queryParams['updated_since'] = $updatedSince;

        return $this;
    }

    /**
     * @param bool $withMessage
     * @return $this
     */
    public function setWithMessages(bool $withMessage): self
    {
        $this->queryParams['with_messages'] = $withMessage ? 'true' : 'false';

        return $this;
    }

    /**
     * @return $this
     */
    public function withMessages(): self
    {
        $this->queryParams['with_messages'] = 'true';

        return $this;
    }

    /**
     * @param array $channelCodes
     * @return $this
     */
    public function setChannelCodes(array $channelCodes): self
    {
        $this->queryParams['channel_codes'] = join(',', $channelCodes);

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads';
    }
}