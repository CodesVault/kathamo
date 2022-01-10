# Howdy
WordPress plugin starter. Based on "Service Provider" design pattern.

<br>
<br>

## Environment setup
1. `composer install`
2. `npm install`
3. `npm run dev`
4. `wp-config.php > define( HOWDY_DEV_MODE, true )` for loading unminified assets.

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

## SingleTon
A trait for singleton is available. You can use it for creating single class instance.
For example: check `HowdyServiceProvider` we have used `SingleTon`, then created class instance in `howdy.php > HowdyServiceProvider::getInstance()`.

<br>
<br>

## HTTP API
Set rest api base url, namespace, version in `HowdyHttp` class

<br>

### Request Example

```php
/**
 * GET request
 * 
 * @param (string) $route
 * @param (array) $arguments
 * @return \Howdy\Helpers\Response
 */
$response = HowdyHttp::get( 'post',
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
$response = HowdyHttp::post( 'authenticate',
    [
        'body' => [ 'token' => 'sdlfepoagdhwt3543sfes' ]
    ]
);
```

<br>

### Response API
HTTP requests return `\Howdy\Helpers\Response` object. This object has apis as below.

```php
getBody()  // json decoded body of the response
getBody(false) // json encoded body

getStatusCode()   // status code of the response
getMessage()   // response message
getHeaders()  // get response headers

dump()  // debug response
```

### Response Example

```php
$response = HowdyHttp::post( 'authenticate',
    [
        'body' => [ 'token' => 'sdlfepoagdhwt3543sfes' ]
    ]
);

if ( $response->getStatusCode() === 200 ) {
    // Do something
}

$response->dump();  // debug response data
```

<br>
<br>

## Deploy Automation

Deploy to WordPress org plugin repo by creating a tag and push it on Github.
For doing so, just go to your plugin Github repo `Settings > Secrets` and create tow variables as below. 
That's it, now whenever you push a tag on Github the plugin will be automatically deployed to WP ORG plugin repo. It remove all development files that are not required in production. If you want to change which development files to remove than just modife `.distignore`.
```
WP_SVN_USER <your svn user>
WP_SVN_PASS <your svn password>
```
