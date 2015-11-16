<?php
/**
 * ZomatoApi Tester
 *
 * @author Valter Nepomuceno <valter.nep@gmail.com>
 * @since 15th November 2015
 * @version 1
 **/

require './../classes/ZomatoApi.php';
 
$zomatoApi = new ZomatoApi;
$jsonResponse = $zomatoApi->getCitiesRequest('Lisbon');
print($jsonResponse);

?>