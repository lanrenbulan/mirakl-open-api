<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use Doubler\MiraklOpenApi\Context;
use GuzzleHttp\Psr7\Utils;

class ReplyThreadRequestBuilder extends AbstractRequestBuilder
{
    private string $threadId;

    protected string $method = 'POST';

    /**
     * @param string $threadId
     * @return $this
     */
    public function setThreadId(string $threadId): self
    {
        $this->threadId = $threadId;

        return $this;
    }

    public function addFile($name, string $file): self
    {
        $this->bodyParams['files'][] = [
            'name' => 'files',
            'filename' => $name,
            'contents' => Utils::tryFopen($file, 'r'),
        ];

        return $this;
    }

    /**
     * @param array $messageInput
     * @return $this
     */
    public function setMessageInput(array $messageInput): self
    {
        $this->bodyParams['message_input'] = [
            'name' => 'message_input',
            'contents' => json_encode($messageInput),
        ];

        return $this;
    }

    protected function beforeBuildRequest(): void
    {
        parent::beforeBuildRequest();

        $elements[] = $this->bodyParams['message_input'];

        if (isset($this->bodyParams['files'])) {
            foreach ($this->bodyParams['files'] as $fileElement) {
                $elements[] = $fileElement;
            }
        }

        $this->bodyParams = $elements;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads/' . $this->threadId . '/message';
    }
}
