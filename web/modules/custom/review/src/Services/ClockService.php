<?php
/**
 * Class.
 */
namespace Drupal\review\Services;

class ClockService{
    public $timezone;
    public function clockservice($timezone) {

    //Using Guzzle To Get Timezone
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', 'http://worldclockapi.com/api/json/'.$timezone.'/now');
    return $response->getBody();
  }
}