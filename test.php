<?php

class saveOrderDAO
{
    var $dbhost = null;
    var $dbuser = null;
    var $dbpass = null;
    var $conn = null;
    var $dbname = null;
    var $result = null;

    function __construct()
    {
        $this->dbhost = Conn::$dbhost;
        $this->dbuser = Conn::$dbuser;
        $this->dbpass = Conn::$dbpass;
        $this->dbname = Conn::$dbname;

    }

    public function openConnection()
    {
//        error_log("host: " . $this->dbhost . " dbuser: " . $this->dbuser . " dbpass: " . $this->dbpass . " dbname: " + $this->dbname);
        $this->conn = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

        if (mysqli_connect_errno())
            echo new Exception("Could not establish connection with database");
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        if ($this->conn != null)
            $this->conn->close();
    }
    public function registerOrder($user_id, $pickupaddress)
    {
        $sql = "insert into orders set uid=?, pickupaddress=?";
        $statement = $this->conn->prepare($sql);

        if (!$statement)
            throw new Exception($statement->error);

        $statement->bind_param("is", $user_id, $pickupaddress);
        $returnValue = $statement->execute();

        return $returnValue;
    }
    public function registerOrderDetails($order_id, $pid,$productquantity)
    {
        $sql = "insert into orderproduct set oid=?, pid=?, productquantity=?";
        $statement = $this->conn->prepare($sql);

        if (!$statement)
            throw new Exception($statement->error);

        $statement->bind_param("iii", $order_id, $pid,$productquantity);
        $returnValue = $statement->execute();

        return $returnValue;
    }
    public function getOrderByUserId($uid)
    {
        $returnValue = array();
        $sql = "SELECT * FROM orders WHERE uid ='" . $uid . "'ORDER BY timestamp DESC LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result != null && (mysqli_num_rows($result) >= 1)) {
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                //$id = $row['oid'];
                return $row['oid'];
            }

        }
        error_log($id)
        //return $id;
    }
}

?>