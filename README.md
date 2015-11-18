# zomato-api-wrapper

![Zomato](http://d152j5tfobgaot.cloudfront.net/wp-content/uploads/2015/02/zomato_newlogo.jpg)

## Description

Wrapper for the Zomato API, written in PHP and retrieving JSON responses.

## Usage

```php
require './classes/ZomatoApi.php';

// Get an instance of the ZomatoApi class
$zomatoApi = new ZomatoApi;
// Invoke the desired method of the Zomato API and get the JSON response
$jsonResponse = $zomatoApi->getCitiesRequest('Lisbon', 0.0, 0.0, '', 0);
```