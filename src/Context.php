<?php

declare(strict_types=1);

namespace Doubler\MiraklOpenApi;

use InvalidArgumentException;

class Context
{
    private array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getApiKey(): string
    {
        if (!isset($this->config['api_key'])) {
            throw new InvalidArgumentException('API key is required.');
        }

        return $this->config['api_key'];
    }

    public function getGatewayUri(): string
    {
        if (!isset($this->config['gateway_uri'])) {
            throw new InvalidArgumentException('Gateway uri is required.');
        }

        return $this->config['gateway_uri'];
    }
}