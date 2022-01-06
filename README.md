# Howdy
WordPress plugin starter. Based on "Service Provider" design pattern.

<br>
<br>

## Environment setup
1. `composer install`
2. `npm install`

<br>

## Plugin Backend Architecture

```
  howdy.php         |---- bootstrap.php
      |
Service Provider    |
      |             |
  Controller        |---- Helpers
      |             |
    Views           |
```

## Debugging Tool/API
On development environment, two apis are available for better debugging experience.

```php
dump($data);  // debug data
dd($data);  // debug data and die. 
```

<br>
<br>

## HTTP API
Set rest api base url, namespace, version in `HowdyHttp` class

<br>

### Request

```php
/**
 * GET request
 * 
 * @param (string) $route
 * @param (array) $arguments
 * @return \Howdy\Helpers\Response
 */
$response = Request::get( 'post',
    [
        'timeout' => 25
    ]
);

/**
 * POST request
 * 
 * @param (string) $route
 * @param (array) $arguments
 * @return \Howdy\Helpers\Response
 */
$response = Request::post( 'authenticate',
    [
        'body' => [ 'token' => 'sdlfepoagdhwt3543sfes' ]
    ]
);
```

<br>

### Response
HTTP requests return `\Howdy\Helpers\Response` object. This object has apis as below.

```php
getBody()  // json decoded body of the response
getBody(false) // json encoded body

getStatusCode()   // status code of the response
getMessage()   // response message
getHeaders()  // get response headers

dump()  // debug response
```
