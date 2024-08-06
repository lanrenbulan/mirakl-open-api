<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class CreateThreadWithOperatorRequestBuilder extends AbstractRequestBuilder
{
    protected string $method = 'POST';

    /**
     * @param array $files
     * @return $this
     */
    public function setFiles(array $files): self
    {
        $this->bodyParams['files'] = $files;

        return $this;
    }

    /**
     * @param array $messageInput
     * @return $this
     */
    public function setMessageInput(array $messageInput): self
    {
        $this->bodyParams['message_input'] = $messageInput;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads';
    }
}