<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi\Offer;

use Doubler\MiraklOpenApi\AbstractRequestBuilder;
use GuzzleHttp\Psr7\Utils;

class ImportOfferRequestBuilder extends AbstractRequestBuilder
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
    public function setOperatorFormat(bool $operatorFormat): self
    {
        $this->bodyParams['operator_format'] = [
            'name' => 'operator_format',
            'contents' => $operatorFormat ? 'true' : 'false',
        ];

        return $this;
    }

    /**
     * @param bool $withProducts
     * @return $this
     */
    public function setWithProducts(bool $withProducts): self
    {
        $this->bodyParams['with_products'] = [
            'name' => 'with_products',
            'contents' => $withProducts ? 'true' : 'false',
        ];

        return $this;
    }

    /**
     * @param string $importMode
     * @return $this
     */
    public function setImportMode(string $importMode): self
    {
        $this->bodyParams['import_mode'] = [
            'name' => 'import_mode',
            'contents' => $importMode,
        ];

        return $this;
    }

    protected function beforeBuildRequest(): void
    {
        parent::beforeBuildRequest();

        $elements[] = $this->bodyParams['file'];

        $elements[] = $this->bodyParams['import_mode'];

        if (isset($this->bodyParams['operator_format'])) {
            $elements[] = $this->bodyParams['operator_format'];
        }

        if (isset($this->bodyParams['with_products'])) {
            $elements[] = $this->bodyParams['with_products'];
        }

        $this->bodyParams = $elements;
    }

    protected function getApiPath(): string
    {
        return '/api/offers/imports';
    }
}