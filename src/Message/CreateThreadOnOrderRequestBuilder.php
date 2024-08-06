<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class CreateThreadOnOrderRequestBuilder extends AbstractRequestBuilder
{
    private string $orderId;

    protected string $method = 'POST';

    public function setOrderId(string $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

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
        return '/api/orders/' . $this->orderId . '/threads';
    }
}