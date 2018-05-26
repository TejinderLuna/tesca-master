<?php

class Sessions
{
    private $username;
    private $password;
	private $remmechkbx;

    /**
     * Sessions constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password, $remmechkbx)
    {
        $this->username = $username;
        $this->password = md5($password);
		$this->remmechkbx = $remmechkbx;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
	
	    /**
     * @return mixed
     */
    public function getRemmechkbx()
    {
        return $this->remmechkbx;
    }

    /**
     * @param mixed $password
     */
    public function setRemmechkbx($remmechkbx)
    {
        $this->remmechkbx = $remmechkbx;
    }
 }