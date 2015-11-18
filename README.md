# zomato-api-wrapper

![Zomato](http://d152j5tfobgaot.cloudfront.net/wp-content/uploads/2015/02/zomato_newlogo.jpg)

## Description

Wrapper for the Zomato API, written in PHP and retrieving JSON responses.

## Usage

Include the needed wrapper class.

```php
require './classes/ZomatoApi.php';
```

Instantiate wrapper choosing XML or JSON data formats. 
```php
$zomatoXmlApi = new ZomatoApi('xml');
$zomatoJsonApi= new ZomatoApi('json');
```

Invoke the desired method of the Zomato API and get the HTTP response.
```php
$jsonResponse = $zomatoJsonApi->getCitiesRequest('Lisbon', 0.0, 0.0, '', 0);
```