<?php

class Announcement
{
    private $announcement_Type;
    private $announcement_Desc;
    private $announcement_By_User_Id;

    /**
     * Announcement constructor.
     * @param $announcement_Type
     * @param $announcement_Desc
     * @param $announcement_By_User_Id
     */
    public function __construct($announcement_Type, $announcement_Desc, $announcement_By_User_Id)
    {
        $this->announcement_Type = $announcement_Type;
        $this->announcement_Desc = $announcement_Desc;
        $this->announcement_By_User_Id = $announcement_By_User_Id;
    }

    /**
     * @return mixed
     */
    public function getAnnouncementType()
    {
        return $this->announcement_Type;
    }

    /**
     * @param mixed $announcement_Type
     */
    public function setAnnouncementType($announcement_Type)
    {
        $this->announcement_Type = $announcement_Type;
    }

    /**
     * @return mixed
     */
    public function getAnnouncementDesc()
    {
        return $this->announcement_Desc;
    }

    /**
     * @param mixed $announcement_Desc
     */
    public function setAnnouncementDesc($announcement_Desc)
    {
        $this->announcement_Desc = $announcement_Desc;
    }

    /**
     * @return mixed
     */
    public function getAnnouncementByUserId()
    {
        return $this->announcement_By_User_Id;
    }

    /**
     * @param mixed $announcement_By_User_Id
     */
    public function setAnnouncementByUserId($announcement_By_User_Id)
    {
        $this->announcement_By_User_Id = $announcement_By_User_Id;
    }



}