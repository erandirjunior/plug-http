# Working with file

## Initialize
```php
use \PlugHttp\Globals\File;

$file = new File();
```

## Methods

>  Getting all files
```php
$file->all();
```

> Getting specific file
```php
$file->get($key);
```

> Getting all files except
```php
$file->except([$keyOne, $keyTwo]);
```

> Getting only files
```php
$request->only([$keyOne, $keyTwo]);
```

> Remove value
```php
$file->remove($key);
```

> Check if has value
```php
$file->has($key);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Response](response.md)
* How to manipulate [Get](get.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)