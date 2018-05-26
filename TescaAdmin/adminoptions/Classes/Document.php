<?php


class Document
{

    private $doc_Name;
    private $doc_Type;
    private $user_Id;
    private $apt_Id;

    /**
     * Document constructor.
     * @param $doc_Name
     * @param $doc_Type
     * @param $doc_Image
     * @param $user_Id
     * @param $apt_Id
     */
    public function __construct($doc_Name, $doc_Type, $user_Id, $apt_Id)
    {
        $this->doc_Name = $doc_Name;
        $this->doc_Type = $doc_Type;
        $this->user_Id = $user_Id;
        $this->apt_Id = $apt_Id;
    }

    /**
     * @return mixed
     */
    public function getDocName()
    {
        return $this->doc_Name;
    }

    /**
     * @param mixed $doc_Name
     */
    public function setDocName($doc_Name)
    {
        $this->doc_Name = $doc_Name;
    }

    /**
     * @return mixed
     */
    public function getDocType()
    {
        return $this->doc_Type;
    }

    /**
     * @param mixed $doc_Type
     */
    public function setDocType($doc_Type)
    {
        $this->doc_Type = $doc_Type;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_Id;
    }

    /**
     * @param mixed $user_Id
     */
    public function setUserId($user_Id)
    {
        $this->user_Id = $user_Id;
    }

    /**
     * @return mixed
     */
    public function getAptId()
    {
        return $this->apt_Id;
    }

    /**
     * @param mixed $apt_Id
     */
    public function setAptId($apt_Id)
    {
        $this->apt_Id = $apt_Id;
    }


}