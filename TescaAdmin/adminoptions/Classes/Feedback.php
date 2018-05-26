<?php

class Feedback
{
   private $first_name;
   private $last_name;
   private $email_id;
   private $contact_num;
   private $feedback_desc;

    /**
     * Feedback constructor.
     * @param $first_name
     * @param $last_name
     * @param $email_id
     * @param $contact_num
     * @param $feedback_desc
     */
    public function __construct($first_name, $last_name, $email_id, $contact_num, $feedback_desc)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email_id = $email_id;
        $this->contact_num = $contact_num;
        $this->feedback_desc = $feedback_desc;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getEmailId()
    {
        return $this->email_id;
    }

    /**
     * @param mixed $email_id
     */
    public function setEmailId($email_id)
    {
        $this->email_id = $email_id;
    }

    /**
     * @return mixed
     */
    public function getContactNum()
    {
        return $this->contact_num;
    }

    /**
     * @param mixed $contact_num
     */
    public function setContactNum($contact_num)
    {
        $this->contact_num = $contact_num;
    }

    /**
     * @return mixed
     */
    public function getFeedbackDesc()
    {
        return $this->feedback_desc;
    }

    /**
     * @param mixed $feedback_desc
     */
    public function setFeedbackDesc($feedback_desc)
    {
        $this->feedback_desc = $feedback_desc;
    }


}