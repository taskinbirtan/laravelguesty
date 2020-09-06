<?php

namespace TaskinBirtan\LaravelGuesty;

use Dompdf\Exception;
use GuzzleHttp\Client;

class GuestyApi
{

    protected $base_url = 'https://api.guesty.com/api/v2/';

    protected $client_id;
    protected $client_pass;

    protected $test_listing;

    protected $http_client;

    protected $response;

    public function __construct()
    {
        $this->client_id = env('GUESTY_USERNAME');
        $this->client_pass = env('GUESTY_PASSWORD');
        if(empty($this->client_id) || empty($this->client_pass)) {
            throw new \Exception("In order to use Guesty Api, please set GUESTY_USERNAME and GUESTY_PASSWORD via env");
        }
        $this->http_client = new Client([
            'base_uri' => $this->base_url,
            'auth' => [
                $this->client_id,
                $this->client_pass
            ]
        ]);

    }

    public function getListings()
    {
        $this->response = $this->http_client->request('GET', 'listings');

        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }

    public function getSingleListing($id)
    {
        $this->response = $this->http_client->request('GET', 'listings/'.$id);
        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }

    public function getAllCities()
    {
        $this->response = $this->http_client->request('GET', 'listings/cities');
        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }

    public function getFinancialsOfListing($id)
    {
        $this->response = $this->http_client->request('GET', 'financials/listing/' . $id);
        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }



}
