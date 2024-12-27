<?php

namespace Suryo\Learn\Controller\Response;

class LoginResponses extends Responses
{
    public array $user;

    public function __construct(int $statusCode, string $message, array $user = NULL)
    {
        parent::__construct($statusCode, $message);
        $this->user = $user;
    }

    public function getData(): array
    {
        return $this->user;
    }
}
