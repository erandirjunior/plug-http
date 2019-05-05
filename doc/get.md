# Working with get

## Initialize
```php
use \PlugHttp\Get;

$get = Get::create();
```

## Methods

>  Getting all values
```php
$get->all();
```

> Getting specific value
```php
$get->get($key);
```

> Getting all values except
```php
$get->except([$keyOne, $keyTwo]);
```

> Getting only values
```php
$get->only([$keyOne, $keyTwo]);
```

> Add value
```php
$get->add($key, $value);
```

> Remove value
```php
$get->remove($key);
```

> Check if has value
```php
$get->has($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)