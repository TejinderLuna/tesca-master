<?php


class Department
{
    private $dept_name;
    private $dept_desc;

    /**
     * Department constructor.
     * @param $dept_name
     * @param $dept_desc
     */
    public function __construct($dept_name, $dept_desc)
    {
        $this->dept_name = $dept_name;
        $this->dept_desc = $dept_desc;
    }

    /**
     * @return mixed
     */
    public function getDeptName()
    {
        return $this->dept_name;
    }

    /**
     * @param mixed $dept_name
     */
    public function setDeptName($dept_name)
    {
        $this->dept_name = $dept_name;
    }

    /**
     * @return mixed
     */
    public function getDeptDesc()
    {
        return $this->dept_desc;
    }

    /**
     * @param mixed $dept_desc
     */
    public function setDeptDesc($dept_desc)
    {
        $this->dept_desc = $dept_desc;
    }



}