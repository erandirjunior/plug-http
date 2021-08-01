<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class TextPlain implements Handler, Advancer
{
    private Handler $handler;

    public function getBody($content): array
    {
        return [$content];
    }

    public function next(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function handle($server): array
    {
        if (ContentHelper::contentIs($server, 'text/plain')) {
            return $this->getBody($server->getContent());
        }

        return $this->handler->handle($server);
    }
}