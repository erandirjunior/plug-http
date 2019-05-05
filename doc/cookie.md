# Working with cookie

## Initialize
```php
use \PlugHttp\Cookie;

$cookie = Cookie::create();
```

## Methods

>  Getting all values
```php
$cookie->all();
```

> Getting specific value
```php
$cookie->input($key);
```

> Getting all values except
```php
$cookie->except([$keyOne, $keyTwo]);
```

> Getting only values
```php
$cookie->only([$keyOne, $keyTwo]);
```

> Remove value
```php
$cookie->remove($key);
```

> Add value
```php
$cookie->add($key, $value, $expire, $path, $domain, $secure, $httponly);
```
***$expire, $path, $domain, $secure and $httponly are optional***

> Check if has value
```php
$cookie->has($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Env](env.md)