<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class XML implements Handler, Advancer
{
    private $handler;

    public function getBody($content)
    {
        return simplexml_load_string($content);
    }

    public function next(Handler $handler)
    {
        $this->handler = $handler;
    }

    private function isTextXml($server)
    {
        return ContentHelper::contentIs($server, 'text/xml');
    }

    private function isApplicationXml($server)
    {
        return ContentHelper::contentIs($server, 'application/xml');
    }

    public function handle($server)
    {
        if ($this->isTextXml($server) || $this->isApplicationXml($server)) {
            return $this->getBody($server->getContent());
        }

        return $this->handler->handle($server);
    }
}