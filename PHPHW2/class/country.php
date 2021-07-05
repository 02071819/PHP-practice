<?php
class Country{
    //1.Attribute
    public $dbConnect;
    //2.Constructor
    public function __construct(){
        //建立真實資料庫連線物件
        $db = new Database();
        //取得資料庫連線物件
        $this->dbConnect = $db->getConnection();
    }
    //3.Method:讀取country表格的country_code欄位
    public function getCode(){
        $sql = "SELECT country_code FROM country";
        $getCode = $this->dbConnect->prepare($sql);
        $getCode->execute();
        $data = $getCode->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>