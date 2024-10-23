<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Utils;

class ImportOfferPriceRequestBuilder extends AbstractRequestBuilder
{
    protected string $method = 'POST';

    public function setFile(string $name, string $file): self
    {
        $this->bodyParams['file'] = [
            'name' => 'file',
            'filename' => $name,
            'contents' => Utils::tryFopen($file, 'r'),
        ];

        return $this;
    }

    protected function beforeBuildRequest(): void
    {
        parent::beforeBuildRequest();

        $elements[] = $this->bodyParams['file'];

        $this->bodyParams = $elements;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/pricing/imports';
    }
}