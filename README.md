# Howdy
WordPress plugin starter. Based on "Service Provider" design pattern.

<br>
<br>

## Environment setup
If make commands work in your OS then just need to run `make setup`.

<br>
Otherwise follow this process:
<br>

1. `composer install`
2. `npm install`
3. `npm run dev`

<br>

If you want to enqueue unminified assets then change `HOWDY_DEV_MODE` to `true` for loading unminified assets.

<br>
<br>

## Plugin Architecture

![Architecture](https://abmsourav.com/welcome/wp-content/uploads/2022/10/howdy-WP-plugin-architecture.png)

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
For example: check `HowdyCore` we have used `SingleTon`, then created class instance in `howdy.php > HowdyCore::getInstance()`.

<br>
<br>

## HTTP API
Set rest api base url, namespace, version in `HttpKernel` class

<br>

### Request Example

```php
/**
 * GET request
 *
 * @param (string) $route
 * @param (array) $arguments
 * @return \Howdy\Core\Lib\Response
 */
$response = HttpKernel::get( 'post',
    [
        'timeout' => 25
    ]
);

/**
 * POST request
 *
 * @param (string) $route
 * @param (array) $arguments
 * @return \Howdy\Core\Lib\Response
 */
$response = HttpKernel::post( 'authenticate',
    [
        'body' => [ 'token' => 'sdlfepoagdhwt3543sfes' ]
    ]
);
```

<br>

### Response API
HTTP requests return `\Howdy\Core\Lib\Response` object. This object has apis as below.

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
$response = HttpKernel::post( 'authenticate',
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

<p>Deploy to WordPress org plugin repo by creating a tag and push it on Github.
For doing so, just go to your plugin Github repo <code>Settings > Secrets</code> and create tow variables as below. Then change <code>SLUG</code> in <code>.github/workflows/diploy.yml</code>, here add your plugin's WP ORG slug.</p>
<p>That's it, now whenever you push a tag on Github the plugin will be automatically deployed to WP ORG plugin repo. It remove all development files that are not required in production. If you want to change which development files to remove than just modife <code>.distignore</code></p>

```
WP_SVN_USER <your svn user>
WP_SVN_PASS <your svn password>
```
