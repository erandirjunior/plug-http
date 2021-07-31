# Working with session

## Initialize
```php
use \PlugHttp\Globals\Session;

$session = new Session();
```

## Methods

>  Getting all values
```php
$session->all();
```

> Getting specific value
```php
$session->get($key);
```

> Getting all values except
```php
$session->except([$keyOne, $keyTwo]);
```

> Getting only values
```php
$session->only([$keyOne, $keyTwo]);
```

> Remove value
```php
$session->remove($key);
```

> Add value
```php
$session->add($key, $value);
```

> Check if has value
```php
$session->has($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)