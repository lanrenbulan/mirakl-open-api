<?php
/**
 * This file is part of doubler.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 */

declare(strict_types=1);

namespace Doubler\MiraklOpenApi;

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