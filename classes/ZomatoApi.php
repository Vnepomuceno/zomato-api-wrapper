<?php
/**
 * ZomatoApi Class
 *
 * @author Valter Nepomuceno <valter.nep€gmail.com>
 * @since 15th November 2015
 * @version 1
 **/
 
class ZomatoApi {
    private $apikey = '9be10252e955cd33f9a9ec30c9eb1e57';
    private $baseUrl = 'https://developers.zomato.com/api/v2.1';
    
    /**
     * @return Json response from querying cities with name 'Lisbon'
     */
    public function dummyGetRequest() {
        $requestUrl = $this->baseUrl . '/cities?q=Lisbon';
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