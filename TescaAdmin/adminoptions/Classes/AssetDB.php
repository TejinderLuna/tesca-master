<?php
require_once 'Databases.php';
require_once 'Asset.php';

class AssetDB
{
    public static function insertRecord($info){
        
        $dbobj=Databases::getDB();
        $query = 'INSERT INTO assets
                 (asset_type,asset_name,asset_qty,asset_purchase_date,asset_vendor_name,asset_unit_price,asset_unit_of_measure)
              VALUES
                 (:asset_type,:asset_name,:asset_qty,:asset_purchase_date,:asset_vendor_name,:asset_unit_price,:asset_unit_of_measure)';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':asset_type', $info->getAssetType());
        $statement->bindValue(':asset_name',$info->getAssetName());
        $statement->bindValue(':asset_qty',$info->getAssetQty());
        $statement->bindValue(':asset_purchase_date', $info->getAssetPurchaseDate());
        $statement->bindValue(':asset_vendor_name',$info->getAssetVendorName());
        $statement->bindValue(':asset_unit_price',$info->getAssetUnitPrice());
        $statement->bindValue(':asset_unit_of_measure',$info->getUnitOfMeasure());
        if($statement->execute()){

            return true;
        }
        else{
            return false;
        }
        $statement->closeCursor();

    }
    public static function deleteRecord($asset_id){
        $dbobj=Databases::getDB();
        
        $query = 'DELETE FROM assets
                  WHERE asset_id = :asset_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':asset_id', $asset_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }
    }
    public static function updateRecord($info,$asst_id){
        $dbobj=Databases::getDB();
        $query = 'UPDATE assets SET asset_type = :asset_type,asset_name = :asset_name,asset_qty = :asset_qty,asset_purchase_date = :asset_purchase_date,asset_vendor_name = :asset_vendor_name,asset_unit_price = :asset_unit_price,asset_unit_of_measure = :asset_unit_of_measure where asset_id = :asset_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':asset_type', $info->getAssetType());
        $statement->bindValue(':asset_name',$info->getAssetName());
        $statement->bindValue(':asset_qty',$info->getAssetQty());
        $statement->bindValue(':asset_purchase_date', $info->getAssetPurchaseDate());
        $statement->bindValue(':asset_vendor_name',$info->getAssetVendorName());
        $statement->bindValue(':asset_unit_price',$info->getAssetUnitPrice());
        $statement->bindValue(':asset_unit_of_measure',$info->getUnitOfMeasure());
        $statement->bindValue(':asset_id',$asst_id);
        if($statement->execute()){
            $statement->closeCursor();
            return true;
        }
        else{
            $statement->closeCursor();
            return false;
        }

    }
	public static function getAssetsData(){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM assets ORDER BY asset_id';
        $statement = $dbobj->prepare($query);
        $statement->execute();
        $assets = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $assets;
    }
    public static function getAssetsDataById($asstid){
        $dbobj=Databases::getDB();
        $query = 'SELECT * FROM assets where asset_id = :asset_id';
        $statement = $dbobj->prepare($query);
        $statement->bindValue(':asset_id',$asstid);
        $statement->execute();
        $assets = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $assets;
    }

}