<?php

namespace Doubler\MiraklOpenApi;

class MessageInputBuilder
{
    private array $data = [];

    public function setBody(string $body): self
    {
        $this->data['body'] = $body;

        return $this;
    }

    /**
     * @param string $type OPERATOR, SHOP, CUSTOMER
     * @param string $id
     * @return $this
     */
    public function setTo(string $type, string $id = ''): self
    {
        $this->data['to'] = [
            'id' => $id,
            'type' => $type,
        ];

        return $this;
    }

    /**
     * @param string $type FREE_TEXT REASON_CODE
     * @param string $value
     * @return $this
     */
    public function setTopic(string $value, string $type = 'FREE_TEXT'): self
    {
        $this->data['topic'] = [
            'type' => $type,
            'value' => $value,
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function build(): array
    {
        return $this->data;
    }
}