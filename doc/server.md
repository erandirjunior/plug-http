# Working with server

## Initialize
```php
use \PlugHttp\Globals\Server;

$server = new Server();
```

## Methods

>  Getting request method
```php
$server->method();
```

> Checks whether the request method is the same as the specified request method
```php
$server->isMethod($method);
```

> Getting all headers
```php
$server->all();
```

> Getting specific header
```php
$server->get('Content-Type');
```

> Getting url
```php
$server->getUrl();
```

> Getting content type
```php
$server->getContentType();
```

> Getting pure content sent
```php
$server->getContent();
```

> Getting all values except
```php
$server->except([$keyOne, $keyTwo]);
```

> Getting only values
```php
$server->only([$keyOne, $keyTwo]);
```

> Add value
```php
$server->add($key, $value);
```

> Check if has value
```php
$server->has($key);
```

> Remove value
```php
$server->remove($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)