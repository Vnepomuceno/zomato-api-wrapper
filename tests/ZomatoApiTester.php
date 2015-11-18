<?php
/**
 * ZomatoApi Tester
 *
 * @author Valter Nepomuceno <valter.nep@gmail.com>
 * @since 15th November 2015
 * @version 1
 **/

require './../classes/ZomatoApi.php';

$zomatoJsonApi = new ZomatoApi('json');
$jsonResponse = $zomatoJsonApi->getCitiesRequest('Lisbon', 0.0, 0.0, '', 0);

$zomatoXmlApi = new ZomatoApi('xml');
$xmlResponse = $zomatoXmlApi->getCitiesRequest('Lisbon', 0.0, 0.0, '', 0);

print($jsonResponse);
print($xmlResponse);

?>