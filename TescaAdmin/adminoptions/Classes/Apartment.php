<?php

class Apartment
{
    private $apt_number;
    private $apt_status;



    /**
     * Apartment constructor.
     * @param $apt_number
     * @param $apt_status
     */
    public function __construct($apt_number, $apt_status)
    {
        $this->apt_number = $apt_number;
        $this->apt_status = $apt_status;
    }

    /**
     * @return mixed
     */
    public function getAptNumber()
    {
        return $this->apt_number;
    }

    /**
     * @param mixed $apt_number
     */
    public function setAptNumber($apt_number)
    {
        $this->apt_number = $apt_number;
    }

    /**
     * @return mixed
     */
    public function getAptStatus()
    {
        return $this->apt_status;
    }

    /**
     * @param mixed $apt_status
     */
    public function setAptStatus($apt_status)
    {
        $this->apt_status = $apt_status;
    }

}