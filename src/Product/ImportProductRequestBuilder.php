<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Product;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Utils;

class ImportProductRequestBuilder extends AbstractRequestBuilder
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

    /**
     * @param bool $operatorFormat
     * @return $this
     */
    public function setMessageInput(bool $operatorFormat): self
    {
        $this->bodyParams['operator_format'] = [
            'name' => 'operator_format',
            'contents' => $operatorFormat ? 'true' : 'false',
        ];

        return $this;
    }

    protected function beforeBuildRequest(): void
    {
        parent::beforeBuildRequest();

        $elements[] = $this->bodyParams['file'];

        $elements[] = $this->bodyParams['message_input'];

        $this->bodyParams = $elements;
    }

    protected function getApiPath(): string
    {
        return '/api/products/imports';
    }
}