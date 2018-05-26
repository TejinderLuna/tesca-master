<?php

class Complaints
{
   private $complaint_id;
   

    public function __construct($complaint_id)
    {
        $this->complaint_id = $complaint_id;
    }

    /**
     * @return mixed
     */
    public function getComplaintId()
    {
        return $this->complaint_id;
    }

    /**
     * @param mixed $complaint_id
     */
    public function setComplaintId($complaint_id)
    {
		$this->complaint_id = $complaint_id;
    }

}