<?php

namespace Suryo\Learn\Controller\Response;

class PostResponses extends Responses
{
    public array $posts;

    public function __construct(int $statusCode, string $message, array $posts = NULL)
    {
        parent::__construct($statusCode, $message);
        $this->posts = $posts;
    }

    public function getData(): array
    {
        return $this->posts;
    }
}
