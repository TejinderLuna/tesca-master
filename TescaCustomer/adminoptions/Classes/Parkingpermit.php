<?php
class parkingpermit
{
private $ptype;
private $pname;
private $validfrom;
private $validuntill;

    public function __construct($ptype,$pname,$validfrom,$validuntill)
    {
        $this->ptype = $ptype;
        $this->pname = $pname;
        $this->validfrom = $validfrom;
        $this->validuntill = $validuntill;
    }
    public function getptype()
    {
        return $this->ptype;
    }

    public function setptype($ptype)
    {
        $this->ptype = $ptype;
    }
    public function getpname()
    {
        return $this->pname;
    }

    public function setpname($pname)
    {
        $this->pname = $pname;
    }
    public function getvalidfrom()
    {
        return $this->validfrom;
    }

    public function setvalidfrom($validfrom)
    {
        $this->validfrom = $validfrom;
    }
    public function getvaliduntill()
    {
        return $this->validuntill;
    }

    public function setvaliduntill($validuntill)
    {
        $this->validuntill = $validuntill;
    }
}