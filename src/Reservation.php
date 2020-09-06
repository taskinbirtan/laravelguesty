<?php

namespace TaskinBirtan\LaravelGuesty;

trait Reservation {

    protected $reservationModel = [];
    protected $reservationStatus = [
        'inquiry', 'declined', 'expired',
        'canceled', 'closed', 'reserved',
        'confirmed', 'checked_in', 'checked_out',
        'awaiting_payment'
    ];

    public function getReservationModel($data)
    {

    }
    public function setReservationCheckInDate($data)
    {
        $this->reservationModel['checkInDateLocalized'] = date('Y-m-d', strtotime($data));
        return $this;
    }
    public function setReservationCheckOutDate($data)
    {
        $this->reservationModel['checkOutDateLocalized'] = date('Y-m-d', strtotime($data));
        return $this;
    }
    public function setReservationMoneyObject($total_amount, $currency_code = 'USD')
    {
        $this->reservationModel['money'] = [
            'fareAccommodation' => $total_amount,
            'currency' => $currency_code
        ];
        return $this;
    }
    public function setReservationGuest($firstName, $lastName, $phone, $email)
    {
        $this->reservationModel['guest'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'phone' => $phone,
            'email' => $email
        ];

        return $this;

    }
    public function setReservationListingId($data)
    {
        $this->reservationModel['listingId'] = $data;
        return $this;
    }
    public function setReservationModel($parameters)
    {

    }

    public function setReservationStatus($data)
    {
        if(in_array($this->reservationStatus, $data)) {
            $this->reservationModel['status'] = $data;
        }
        return $this;
    }

}
