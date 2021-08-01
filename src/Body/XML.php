<?php

namespace PlugHttp\Body;

use PlugHttp\Utils\ContentHelper;

class XML implements Handler, Advancer
{
    private Handler $handler;

    public function getBody($content): array
    {
        $xml = simplexml_load_string($content);
        $json = json_encode($xml);

        return json_decode($json, true);
    }

    public function next(Handler $handler)
    {
        $this->handler = $handler;
    }

    private function isTextXml($server): bool
    {
        return ContentHelper::contentIs($server, 'text/xml');
    }

    private function isApplicationXml($server): bool
    {
        return ContentHelper::contentIs($server, 'application/xml');
    }

    public function handle($server): array
    {
        $isTextXML = $this->isTextXml($server);
        $isApplicationXML = $this->isApplicationXml($server);

        if ($isTextXML || $isApplicationXML) {
            return $this->getBody($server->getContent());
        }

        return $this->handler->handle($server);
    }
}