<?php
require_once 'Databases.php';
require_once 'Department.php';

class DepartmentDB
{
    public static function insertRecord($info){
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO departments
                 (dept_name,dept_desc)
              VALUES
                 (:dept_name,:dept_desc)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':dept_name', $info->getDeptName());
        $statement->bindValue(':dept_desc',$info->getDeptDesc());
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();
    }
    public static function deleteRecord($dept_id){
        $dbobj=Databases::getDB();
        
        $query = 'DELETE FROM departments
                  WHERE dept_id = :dept_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':dept_id', $dept_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }
    public static function updateRecord($info,$dpt_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE departments SET dept_name = :dept_name,dept_desc = :dept_desc where dept_id = :dept_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':dept_name', $info->getDeptName());
        $statement->bindValue(':dept_desc',$info->getDeptDesc());
        $statement->bindValue(':dept_id',$dpt_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }
	public static function getDepartmentData()
    {
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM departments ORDER BY dept_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $depts = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        $statement->closeCursor();
        return $depts;
    }
    public static function getDepartmentDataById($dpt_id)
    {
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM departments where dept_id = :dept_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':dept_id',$dpt_id);
        $statement->execute();
        $depts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $depts;
    }
}