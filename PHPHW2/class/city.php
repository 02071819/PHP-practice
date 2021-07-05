<?php
    class City
    {
        //Attribute
        //資料庫連線
        public $dbConnect;

        public $id;
        public $cityName;
        public $cityPop;
        public $countryCode;
        
        //自動執行建構式
        public function __construct()
        {
            //建立資料庫連線物件
            $db = new Database();
            //物件設定給dbConnect屬性 取得資料庫連線物件
            $this->dbConnect = $db->getConnection();
        }

        //Method
        //1.Read all data table 
        public function getAllCity()
        {
            $sql = "SELECT * FROM city";
            $getData = $this->dbConnect->prepare($sql);
            $getData->execute();
            $data = $getData->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        //2.Insert Data
        public function create()
        {
            $sql = "INSERT INTO city(city_name, population, country_code)
                    VALUES(:city_name, :population, :country_code)";
            $addData = $this->dbConnect->prepare($sql);
            $addData->bindParam(":city_name", $this->cityName);
            $addData->bindParam(":population", $this->cityPop);
            $addData->bindParam(":country_code", $this->countryCode);
            //執行SQL指令
            $result = $addData->execute();
            return $result;
        }
        //3.根據URL的id參數讀取單一筆要編輯的資料
        public function  getOneCity()
        {
            $sql = "SELECT * FROM city WHERE id = :id";
            $getOneCity = $this->dbConnect->prepare($sql);
            $getOneCity->bindParam(":id", $this->id);
            $getOneCity->execute();
            $data = $getOneCity->fetch(PDO::FETCH_ASSOC);
            //讀出的該筆資料 存到attribute當中
            $this->cityName = $data["city_name"];
            $this->cityPop = $data["population"];
            $this->countryCode = $data["country_code"];
        }
        //4.Update Data
        public function update()
        {
            $sql = "UPDATE city
                    SET city_name = :city_name,
                        population = :population ,
                        country_code = :country_code
                    WHERE id = :id";
            $updateData = $this->dbConnect->prepare($sql);
            $updateData->bindParam(":city_name", $this->cityName);
            $updateData->bindParam(":population", $this->cityPop);
            $updateData->bindParam(":country_code", $this->countryCode);
            $updateData->bindParam(":id", $this->id);
    
            $result = $updateData->execute();
            return $result;
        }
        //5.Delete Data
        public function delete()
        {
            $sql = "DELETE FROM city WHERE id = :id";
            $deleteData = $this->dbConnect->prepare($sql);
            $deleteData->bindParam(":id", $this->id);
            $result = $deleteData->execute();
            return $result;
        }
    }
?> 