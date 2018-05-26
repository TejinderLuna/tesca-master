<?php

class Users
{
    private $first_Name;
    private $middle_Name;
    private $last_Name;
    private $home_Phone;
    private $alternate_Phone;
    private $cell_Phone;
    private $email;
    private $address_Line1;
    private $address_Line2;
    private $city;
    private $province;
    private $zipcode;
    private $country;
    private $user_Name;
    private $password;
    private $is_Active;
    private $user_Category;

    /**
     * Users constructor.
     * @param $first_Name
     * @param $middle_Name
     * @param $last_Name
     * @param $home_Phone
     * @param $alternate_Phone
     * @param $cell_Phone
     * @param $email
     * @param $address_Line1
     * @param $address_Line2
     * @param $city
     * @param $province
     * @param $zipcode
     * @param $country
     * @param $user_Name
     * @param $password
     * @param $is_Active
     * @param $user_Category
     */
    public function __construct($first_Name, $middle_Name, $last_Name, $home_Phone, $alternate_Phone, $cell_Phone, $email, $address_Line1, $address_Line2, $city, $province, $zipcode, $country, $user_Name, $password, $is_Active, $user_Category)
    {
        $this->first_Name = $first_Name;
        $this->middle_Name = $middle_Name;
        $this->last_Name = $last_Name;
        $this->home_Phone = $home_Phone;
        $this->alternate_Phone = $alternate_Phone;
        $this->cell_Phone = $cell_Phone;
        $this->email = $email;
        $this->address_Line1 = $address_Line1;
        $this->address_Line2 = $address_Line2;
        $this->city = $city;
        $this->province = $province;
        $this->zipcode = $zipcode;
        $this->country = $country;
        $this->user_Name = $user_Name;
        $this->password = $password;
        $this->is_Active = $is_Active;
        $this->user_Category = $user_Category;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_Name;
    }

    /**
     * @param mixed $first_Name
     */
    public function setFirstName($first_Name)
    {
        $this->first_Name = $first_Name;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middle_Name;
    }

    /**
     * @param mixed $middle_Name
     */
    public function setMiddleName($middle_Name)
    {
        $this->middle_Name = $middle_Name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_Name;
    }

    /**
     * @param mixed $last_Name
     */
    public function setLastName($last_Name)
    {
        $this->last_Name = $last_Name;
    }

    /**
     * @return mixed
     */
    public function getHomePhone()
    {
        return $this->home_Phone;
    }

    /**
     * @param mixed $home_Phone
     */
    public function setHomePhone($home_Phone)
    {
        $this->home_Phone = $home_Phone;
    }

    /**
     * @return mixed
     */
    public function getAlternatePhone()
    {
        return $this->alternate_Phone;
    }

    /**
     * @param mixed $alternate_Phone
     */
    public function setAlternatePhone($alternate_Phone)
    {
        $this->alternate_Phone = $alternate_Phone;
    }

    /**
     * @return mixed
     */
    public function getCellPhone()
    {
        return $this->cell_Phone;
    }

    /**
     * @param mixed $cell_Phone
     */
    public function setCellPhone($cell_Phone)
    {
        $this->cell_Phone = $cell_Phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->address_Line1;
    }

    /**
     * @param mixed $address_Line1
     */
    public function setAddressLine1($address_Line1)
    {
        $this->address_Line1 = $address_Line1;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->address_Line2;
    }

    /**
     * @param mixed $address_Line2
     */
    public function setAddressLine2($address_Line2)
    {
        $this->address_Line2 = $address_Line2;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_Name;
    }

    /**
     * @param mixed $user_Name
     */
    public function setUserName($user_Name)
    {
        $this->user_Name = $user_Name;
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
    public function getisActive()
    {
        return $this->is_Active;
    }

    /**
     * @param mixed $is_Active
     */
    public function setIsActive($is_Active)
    {
        $this->is_Active = $is_Active;
    }

    /**
     * @return mixed
     */
    public function getUserCategory()
    {
        return $this->user_Category;
    }

    /**
     * @param mixed $user_Category
     */
    public function setUserCategory($user_Category)
    {
        $this->user_Category = $user_Category;
    }





}