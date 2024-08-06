<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class RetrieveThreadRequestBuilder extends AbstractRequestBuilder
{
    private string $threadId;

    /**
     * @param string $threadId
     * @return $this
     */
    public function setThreadId(string $threadId): self
    {
        $this->threadId = $threadId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads/' . $this->threadId;
    }
}