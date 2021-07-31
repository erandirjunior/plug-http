<?php

namespace PlugHttp;

use PlugHttp\Body\Content;
use PlugHttp\Globals\Cookie;
use PlugHttp\Globals\Env;
use PlugHttp\Globals\File;
use PlugHttp\Globals\Get;
use PlugHttp\Globals\Server;
use PlugHttp\Globals\Session;

/**
 * Class Request
 * @package PlugHttp
 */
class Request
{
    /**
     * @var Cookie
     */
    private Cookie $cookie;

    /**
     * @var Env
     */
    private Env $env;

    /**
     * @var File
     */
    private File $file;

    /**
     * @var Get
     */
    private Get $get;

    /**
     * @var Server
     */
    private Server $server;

    /**
     * @var Session
     */
    private Session $session;

    /**
     * @var Content
     */
    private Content $content;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->cookie = new Cookie();
        $this->env = new Env();
        $this->file = new File();
        $this->get = new Get();
        $this->server = new Server();
        $this->session = new Session();
        $this->content = new Content($this->server);
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addCookie(string $key, $value, $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false): void
    {
        $this->cookie->add($key, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function cookies(?string $key = null)
    {
        if ($key) {
            return $this->cookie->get($key);
        }

        return $this->cookie->all();
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasCookie($key): bool
    {
        return $this->cookie->has($key);
    }

    /**
     * @param $key
     */
    public function removeCookie($key): void
    {
        $this->cookie->remove($key);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptCookie(array $values): array
    {
        return $this->cookie->except($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlyCookie(array $values): array
    {
        return $this->cookie->only($values);
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function query(?string $key = null)
    {
        if ($key) {
            return $this->get->get($key);
        }

        return $this->get->all();
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addQuery(string $key, $value): void
    {
        $this->get->add($key, $value);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlyQuery(array $values): array
    {
        return $this->get->only($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptQuery(array $values): array
    {
        return $this->get->except($values);
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasQuery(string $value): bool
    {
        return $this->get->has($value);
    }

    /**
     * @param string $key
     */
    public function removeQuery(string $key): void
    {
        $this->get->remove($key);
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function env(?string $key = null)
    {
        if ($key) {
            return $this->env->get($key);
        }

        return $this->env->all();
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addEnv(string $key, $value): void
    {
        $this->env->add($key, $value);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlyEnv(array $values): array
    {
        return $this->env->only($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptEnv(array $values): array
    {
        return $this->env->except($values);
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasEnv(string $value): bool
    {
        return $this->env->has($value);
    }

    /**
     * @param string $key
     */
    public function removeEnv(string $key): void
    {
        $this->env->remove($key);
    }

    /**
     * @param string|null $key
     * @return array
     */
    public function file(?string $key = null)
    {
        if ($key) {
            return $this->file->get($key);
        }

        return $this->file->all();
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasFile($key): bool
    {
        return $this->file->has($key);
    }

    /**
     * @param $key
     */
    public function removeFile($key): void
    {
        $this->file->remove($key);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptFile(array $values): array
    {
        return $this->file->except($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlyFile(array $values): array
    {
        return $this->file->only($values);
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addHeader(string $key, $value): void
    {
        $this->server->add($key, $value);
    }

    /**
     * @param string $key
     * @return array|mixed
     */
    public function header(string $key)
    {
        return $this->server->get($key);
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasheader($key): bool
    {
        return $this->server->has($key);
    }

    /**
     * @param $key
     */
    public function removeHeader($key): void
    {
        $this->server->remove($key);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptHeaders(array $values): array
    {
        return $this->server->except($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlyHeaders(array $values): array
    {
        return $this->server->only($values);
    }

    /**
     * @return string
     */
    public function method(): string
    {
        return $this->server->method();
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->server->getUrl();
    }

    /**
     * @param string $method
     * @return bool
     */
    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    /**
     * @return array
     */
    public function headers(): array
    {
        return $this->server->all();
    }

    /**
     * @param string $path
     * @param int $code
     * @return bool
     */
    public function redirect(string $path, int $code = 301)
    {
        header("HTTP/1.0 {$code}");
        header("Location: {$path}");

        return true;
    }

    /**
     * @param string $key
     * @param $value
     */
    public function addSession(string $key, $value): void
    {
        $this->session->add($key, $value);
    }

    /**
     * @param string|null $key
     * @return array|mixed
     */
    public function session(?string $key = null)
    {
        if ($key) {
            return $this->session->get($key);
        }

        return $this->session->all();
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasSession($key): bool
    {
        return $this->session->has($key);
    }

    /**
     * @param $key
     */
    public function removeSession($key): void
    {
        $this->session->remove($key);
    }

    /**
     * @param array $values
     * @return array
     */
    public function exceptSession(array $values): array
    {
        return $this->session->except($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function onlySession(array $values): array
    {
        return $this->session->only($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function except(array $values)
    {
        return $this->content->except($values);
    }

    /**
     * @param array $values
     * @return array
     */
    public function only(array $values)
    {
        return $this->content->only($values);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return $this->content->has($key);
    }

    /**
     * @param string $key
     */
    public function remove(string $key): void
    {
        $this->content->remove($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {
        $this->content->add($key, $value);
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->content->all();
    }

    /**
     * @param string $value
     * @return mixed
     */
    public function get(string $value)
    {
        return $this->content->get($value);
    }

    /**
     * @param $name
     */
    public function __get($name)
    {
        return $this->content->$name;
    }
}