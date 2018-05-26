<?php


class Asset
{
    private $asset_Type;
    private $asset_Name;
    private $asset_Qty;
    private $asset_Purchase_Date;
    private $asset_Vendor_Name;
    private $asset_Unit_price;
    private $unit_Of_Measure;

    /**
     * Asset constructor.
     * @param $asset_Type
     * @param $asset_Name
     * @param $asset_Qty
     * @param $asset_Purchase_Date
     * @param $asset_Vendor_Name
     * @param $asset_Unit_price
     * @param $unit_Of_Measure
     */
    public function __construct($asset_Type, $asset_Name, $asset_Qty, $asset_Purchase_Date, $asset_Vendor_Name, $asset_Unit_price, $unit_Of_Measure)
    {
        $this->asset_Type = $asset_Type;
        $this->asset_Name = $asset_Name;
        $this->asset_Qty = $asset_Qty;
        $this->asset_Purchase_Date = $asset_Purchase_Date;
        $this->asset_Vendor_Name = $asset_Vendor_Name;
        $this->asset_Unit_price = $asset_Unit_price;
        $this->unit_Of_Measure = $unit_Of_Measure;
    }

    /**
     * @return mixed
     */
    public function getAssetType()
    {
        return $this->asset_Type;
    }

    /**
     * @param mixed $asset_Type
     */
    public function setAssetType($asset_Type)
    {
        $this->asset_Type = $asset_Type;
    }

    /**
     * @return mixed
     */
    public function getAssetName()
    {
        return $this->asset_Name;
    }

    /**
     * @param mixed $asset_Name
     */
    public function setAssetName($asset_Name)
    {
        $this->asset_Name = $asset_Name;
    }

    /**
     * @return mixed
     */
    public function getAssetQty()
    {
        return $this->asset_Qty;
    }

    /**
     * @param mixed $asset_Qty
     */
    public function setAssetQty($asset_Qty)
    {
        $this->asset_Qty = $asset_Qty;
    }

    /**
     * @return mixed
     */
    public function getAssetPurchaseDate()
    {
        return $this->asset_Purchase_Date;
    }

    /**
     * @param mixed $asset_Purchase_Date
     */
    public function setAssetPurchaseDate($asset_Purchase_Date)
    {
        $this->asset_Purchase_Date = $asset_Purchase_Date;
    }

    /**
     * @return mixed
     */
    public function getAssetVendorName()
    {
        return $this->asset_Vendor_Name;
    }

    /**
     * @param mixed $asset_Vendor_Name
     */
    public function setAssetVendorName($asset_Vendor_Name)
    {
        $this->asset_Vendor_Name = $asset_Vendor_Name;
    }

    /**
     * @return mixed
     */
    public function getAssetUnitPrice()
    {
        return $this->asset_Unit_price;
    }

    /**
     * @param mixed $asset_Unit_price
     */
    public function setAssetUnitPrice($asset_Unit_price)
    {
        $this->asset_Unit_price = $asset_Unit_price;
    }

    /**
     * @return mixed
     */
    public function getUnitOfMeasure()
    {
        return $this->unit_Of_Measure;
    }

    /**
     * @param mixed $unit_Of_Measure
     */
    public function setUnitOfMeasure($unit_Of_Measure)
    {
        $this->unit_Of_Measure = $unit_Of_Measure;
    }



}