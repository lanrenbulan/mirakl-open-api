<?php

namespace Doubler\MiraklOpenApi;

trait PaginationTrait
{
    public function setMax(int $max)
    {
        $this->queryParams['max'] = $max;
    }

    public function setOffset(int $offset)
    {
        $this->queryParams['offset'] = $offset;
    }
}