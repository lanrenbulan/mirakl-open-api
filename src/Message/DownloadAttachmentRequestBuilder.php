<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Message;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;

class DownloadAttachmentRequestBuilder extends AbstractRequestBuilder
{
    private string $attachmentId;

    /**
     * @param string $attachmentId
     * @return $this
     */
    public function setAttachmentId(string $attachmentId): self
    {
        $this->attachmentId = $attachmentId;

        return $this;
    }

    protected function getApiPath(): string
    {
        return '/api/inbox/threads/' . $this->attachmentId . '/download';
    }
}