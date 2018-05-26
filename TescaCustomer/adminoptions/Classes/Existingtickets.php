<?php
class Existingtickets
{
    private $complaints_dept ;
    private $complaint_category;
    private $complaint_sub_category;
    private $complaint_desc;
    private $complaint_img;

    public function __construct($complaints_dept,$complaint_category,$complaint_sub_category,$complaint_desc,$complaint_img)
    {
        $this->complaints_dept = $complaints_dept;
        $this->complaint_category = $complaint_category;
        $this->complaint_sub_category = $complaint_sub_category;
        $this->complaint_desc = $complaint_desc;
        $this->complaint_img = $complaint_img;
    }
    public function getcomplaints_dept()
    {
        return $this->complaints_dept;
    }
    public function setcomplaints_dept($complaints_dept)
    {
        $this->complaints_dept = $complaints_dept;
    }


    public function getcomplaint_category()
    {
        return $this->complaint_category;
    }
    public function setcomplaint_category($complaint_category)
    {
        $this->complaint_category = $complaint_category;
    }


    public function getcomplaint_sub_category()
    {
        return $this->complaint_sub_category;
    }
    public function setcomplaint_sub_category($complaint_sub_category)
    {
        $this->complaint_sub_category = $complaint_sub_category;
    }


    public function getcomplaint_desc()
    {
        return $this->complaint_desc;
    }
    public function setcomplaint_desc($complaint_desc)
    {
        $this->complaint_desc = $complaint_desc;
    }


    public function getcomplaint_img()
    {
        return $this->complaint_img;
    }
    public function setcomplaint_img($complaint_img)
    {
        $this->complaint_img = $complaint_img;
    }

/*
    public function getdate_created()
    {
        return $this->date_created;
    }
    public function setdate_createdc($date_created)
    {
        $this->date_created = $date_created;
    }


    public function getdate_modified()
    {
        return $this->date_modified;
    }
    public function setdate_modified($date_modified)
    {
        $this->date_modified = $date_modified;
    }


    public function getcomplaint_status()
    {
        return $this->complaint_status;
    }
    public function setcomplaint_status($complaint_status)
    {
        $this->complaint_status = $complaint_status;
    }*/





}