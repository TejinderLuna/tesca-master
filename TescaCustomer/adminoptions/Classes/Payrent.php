<?php

class Payrent
{
    private $rent_for_month;
    private $rent_amount;
    private $aptid;
    private $payment_method;

    public function __construct($rent_for_month, $rent_amount,$aptid, $payment_method)
    {
        $this->rent_for_month = $rent_for_month;
        $this->rent_amount = $rent_amount;
        $this->aptid = $aptid;
        $this->payment_method = $payment_method;
    }

       public function getRentForMonth()
    {
        return $this->rent_for_month;
    }

       public function setRentForMonth($rent_for_month)
    {
        $this->rent_for_month = $rent_for_month;
    }

       public function getRentAmount()
    {
        return $this->rent_amount;
    }

       public function setRentAmount($rent_amount)
    {
        $this->rent_amount = $rent_amount;
    }

       public function getAptid()
    {
        return $this->aptid;
    }

     public function setAptid($aptid)
    {
        $this->aptid = $aptid;
    }

       public function getPaymentMethod()
    {
        return $this->payment_method;
    }

       public function setPaymentMethod($payment_method)
    {
        $this->payment_method = $payment_method;
    }

}