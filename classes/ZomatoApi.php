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
     * @param string  $q            Query by city name
     * @param double  $lat          Latitude
     * @param double  $lon          Longitude
     * @param string  $city_ids     Comma separated city_id values
     * @param integer $count        Number of max results to display
     * @return JSON response from querying cities
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
     * GET /collections => Returns Zomato Restaurant Collections in a City
     * @param integer $city_id  Id of the city for which collections are needed
     * @param double  $lat      Latitude of any point within a city
     * @param double  $lon      Longitude of any point within a city
     * @param integer $count    Max number of results needed
     * @return JSON response from querying collections
     */
    public function getCollectionsRequest($city_id, $lat, $lon, $count) {
        $requestUrl = $this->baseUrl . '/collections';
        if (!empty($city_id)) $requestUrl = $requestUrl . '?city_id=' . $city_id;
        if (!empty($lat)) $requestUrl = $requestUrl . '&lat=' . $lat;
        if (!empty($lon)) $requestUrl = $requestUrl . '&lon=' . $lon;
        if (!empty($count)) $requestUrl = $requestUrl . '&count=' . $count;
        
        return $this->getCurlRequest($requestUrl);
    }
    
    /**
     * GET /cuisines => Get a list of all cuisines of restaurants listed in a city
     * @param integer $city_id  Id of the city for which collections are needed
     * @param double  $lat      Latitude of any point within a city
     * @param double  $lon      Longitude of any point within a city
     * @return JSON response from querying cuisines
     */
    public function getCuisinesRequest($city_id, $lat, $lon) {
        $requestUrl = $this->baseUrl . '/cuisines';
        if (!empty($city_id)) $requestUrl = $requestUrl . '?city_id=' . $city_id;
        if (!empty($lat)) $requestUrl = $requestUrl . '&lat=' . $lat;
        if (!empty($lon)) $requestUrl = $requestUrl . '&lon=' . $lon;
        
        return $this->getCurlRequest($requestUrl);
    }
    
    /**
     * GET /establishments => Get a list of restaurant types in a city
     * @param integer $city_id  Id of the city for which collections are needed
     * @param double  $lat      Latitude of any point within a city
     * @param double  $lon      Longitude of any point within a city
     * @return JSON response from querying establishments
     */
    public function getEstablishmentsRequest($city_id, $lat, $lon) {
        $requestUrl = $this->baseUrl . '/establishments';
        if (!empty($city_id)) $requestUrl = $requestUrl . '?city_id=' . $city_id;
        if (!empty($lat)) $requestUrl = $requestUrl . '&lat=' . $lat;
        if (!empty($lon)) $requestUrl = $requestUrl . '&lon=' . $lon;
        
        return $this->getCurlRequest($requestUrl);
    }
    
    /**
     * GET /geocode => Get Foodie and Nightlife Index, list of popular cuisines
     *                 and nearby restaurants around the given coordinates
     * @param double  $lat      Latitude of any point within a city
     * @param double  $lon      Longitude of any point within a city
     * @return JSON response from querying geocode
     */
    public function getGeocodeRequest($lat, $lon) {
        $requestUrl = $this->baseUrl . '/geocode';
        if (!empty($lat)) $requestUrl = $requestUrl . '?lat=' . $lat;
        if (!empty($lon)) $requestUrl = $requestUrl . '&lon=' . $lon;
        
        return $this->getCurlRequest($requestUrl);
    }
    
    
    /**
     * Sends HTTP GET Request to the request URL using CURL
     * @param string $requestUrl Request URL to execute CURL
     * @return JSON response from querying request URL
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