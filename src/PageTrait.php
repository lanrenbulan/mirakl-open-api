<?php

namespace Doubler\MiraklOpenApi;

trait PageTrait
{
    public function setMax(int $max): static
    {
        $this->queryParams['max'] = $max;

        return $this;
    }

    public function setOffset(int $offset): static
    {
        $this->queryParams['offset'] = $offset;

        return $this;
    }
}