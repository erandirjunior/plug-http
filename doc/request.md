# Working with request

## Initialize
```php
use \PlugHttp\Request;

$request = Request::create();
```

## Manipulate Body

>  Getting all body values as array
```php
$request->all();
```

>  Getting all body values as object
```php
$request->bodyObject();
```
***Can retun stdClass, SimpleXMLElement or Exception***

> Getting specific body value
```php
$request->input($key);
```

> Getting all body values except
```php
$request->except([$keyOne, $keyTwo]);
```

> Getting only body values
```php
$request->only([$keyOne, $keyTwo]);
```

> Add value
```php
$request->add($key, $value);
```

> Remove value
```php
$request->remove($key);
```

> Check if has value
```php
$request->has($key);
```

## Manipulate Get

>  Getting all query values
```php
$request->query();
```

> Getting specific query value
```php
$request->queryWith($key);
```

> Getting all query values except
```php
$request->queryExcept([$keyOne, $keyTwo]);
```

> Getting only query values
```php
$request->queryOnly([$keyOne, $keyTwo]);
```

> Add value
```php
$request->addQuery($key, $value);
```

> Remove value
```php
$request->removeQuery($key);
```

## Manipulate File

> Getting files
```php
$request->files();
```

## Manipulate Server

> Getting method
```php
$request->method();
```

> Check method
```php
$request->isMethod($method);
```

> Getting all headers
```php
$request->headers();
```

> Getting specific header value
```php
$request->header('Content-Type');
```

> Getting url
```php
$request->getUrl();
```

> Redirecting
```php
$request->redirect($url, $code);
```
**$code is optional**

## See too
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)