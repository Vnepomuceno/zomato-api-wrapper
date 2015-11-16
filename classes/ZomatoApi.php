<?php
/**
 * ZomatoApi Class
 *
 * @author Valter Nepomuceno <valter.nep@gmail.com>
 * @since 15th November 2015
 * @version 1
 **/
 
class ZomatoApi {
    
    private $apikey = '9be10252e955cd33f9a9ec30c9eb1e57';
    private $baseUrl = 'https://developers.zomato.com/api/v2.1';
    
    /**
     * GET /cities => Find the Zomato ID and other details for a city
     * @param string $q Query by city name
     * @param double $lat Latitude
     * @param double $lon Longitude
     * @param string $city_ids Comma separated city_id values
     * @param integer $count Number of max results to display
     * @return Json response from querying cities
     */
    public function getCitiesRequest($q, $lat, $lon, $city_ids, $count) {
        $requestUrl = $this->baseUrl . '/cities';
        if (!empty($q)) $requestUrl = $requestUrl . '?q=' . $q;
        if (!empty($lat)) $requestUrl = $requestUrl . '&lat=' . $lat;
        if (!empty($lon)) $requestUrl = $requestUrl . '&lon=' . $lon;
        if (!empty($city_ids)) $requestUrl = $requestUrl . '&city_ids=' . $city_ids;
        if (!empty($count)) $requestUrl = $requestUrl . '&count=' . $count;
        
        return $this->getCurlRequest($requestUrl);
    }
    
    /**
     * Sends HTTP GET Request to the request URL using CURL
     * @param string $requestUrl Request URL to execute CURL
     */
    private function getCurlRequest($requestUrl) {
        $header = array('user_key: ' . $this->apikey);
        
        $curl = curl_init($requestUrl);
        curl_setopt($curl, CURLOPT_URL, $requestUrl);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        
        $response = curl_exec($curl);
        curl_close($curl);
        
        return $response;
    }
}

?>