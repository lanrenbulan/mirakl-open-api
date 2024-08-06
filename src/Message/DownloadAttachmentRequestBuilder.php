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

class DownloadAttachmentRequestBuilder extends AbstractRequestBuilder
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
        return '/api/inbox/threads/' . $this->threadId . '/message';
    }
}