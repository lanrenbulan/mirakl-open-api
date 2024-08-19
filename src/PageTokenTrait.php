<?php

namespace Doubler\MiraklOpenApi;

trait PageTokenTrait
{
    public function setPageToken(string $setPageToken): static
    {
        $this->queryParams['page_token'] = $setPageToken;

        return $this;
    }

    public function setLimit(int $limit): static
    {
        $this->queryParams['limit'] = $limit;

        return $this;
    }
}