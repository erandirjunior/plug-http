# Working with response

## Initialize
```php
use \PlugHttp\Response;

$response = Response::create();
```

## Methods

>  Setting status code
```php
$response->setStatusCode($statusCode);
```

> Getting status code
```php
$response->getStatusCode($key);
```

> Setting several headers
```php
$response->addHeaders(['Content-Type: application/json']);
```

> Setting one header
```php
$response->addHeader('Content-Type', 'application/json');
```

> Getting headers
```php
$response->getHeaders();
```

> Applying headers
```php
$response->response();
```

> Return json
```php
echo $response->json(['name' => 'Erandir']);
```

> Headers with json
```php
echo $response
    ->addHeader('Content-Type', 'application/json')
    ->response()
    ->json(['name' => 'Erandir']);
```

## See too
* How to manipulate [Request](request.md)
* How to manipulate [Get](get.md)
* How to manipulate [File](file.md)
* How to manipulate [Server](server.md)
* How to manipulate [Session](session.md)
* How to manipulate [Cookie](cookie.md)
* How to manipulate [Env](env.md)