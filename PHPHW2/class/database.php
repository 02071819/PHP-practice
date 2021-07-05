<?php
class Database{
    //取得資料庫的連線方法
    public function getConnection(){
        $dbConnect = new PDO("mysql:host=localhost;port=3306;dbname=country_db","root","");
        return $dbConnect;
    }
}
?>