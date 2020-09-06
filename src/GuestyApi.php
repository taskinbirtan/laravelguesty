<?php

namespace TaskinBirtan\LaravelGuesty;

use GuzzleHttp\Client;

class GuestyApi
{

    use Reservation;

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

    public function getCalendarOfListing($id, $start_date = null, $end_date = null)
    {
        if(empty($start_date) || empty($end_date)) {
            $start_date = date('Y-01-01');
            $end_date = date('Y-m-d', strtotime('last day of december'));

        }
        $this->response = $this->http_client->request('GET', 'listings/' . $id . '/calendar', [
            'query' => [
                'from' => strtotime(date('Y-m-d'), $start_date),
                'to' => strtotime(date('Y-m-d'), $end_date)
            ]
        ]);
        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }
    public function createReservation()
    {
        /*TODO oncelikle rezervasyon modeli hazirlanmis olmalidir.*/
        $this->response = $this->http_client->request('POST', 'reservations', [
            'form_params' => $this->getReservationModel()
        ]);
        if($this->response->getStatusCode() == 200) {
            return $this->response->getBody();
        } else {
            return 'hata';
        }
    }



}
