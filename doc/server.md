# Working with server

## Initialize
```php
use \PlugHttp\Server;

$server = Server::create();
```

## Methods

>  Getting method
```php
$server->method();
```

> Check if method it is
```php
$server->isMethod($method);
```

> Check if method it is
```php
$server->isMethod($method);
```

> Getting all headers
```php
$server->headers();
```

> Getting specific headers
```php
$server->header('Content-Type');
```

> Getting url
```php
$server->getUrl();
```

> Getting content type
```php
$server->getContentType();
```

> Getting content from php://input
```php
$server->getContent();
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)