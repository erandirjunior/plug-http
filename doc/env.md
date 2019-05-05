# Working with get

## Initialize
```php
use \PlugHttp\Env;

$env = Env::create();
```

## Methods

>  Getting all values
```php
$env->all();
```

> Getting specific value
```php
$env->get($key);
```

> Getting all values except
```php
env->except([$keyOne, $keyTwo]);
```

> Getting only values
```php
env->only([$keyOne, $keyTwo]);
```

> Add value
```php
env->add($key, $value);
```

> Remove value
```php
env->remove($key);
```

> Check if has value
```php
env->has($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)