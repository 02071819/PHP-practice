<?php
include "./class/database.php";
include "./class/city.php";
$city = new City();
$city->id = $_GEET["id"];

if($city->delete()){
    //刪除成功倒回首頁
    header("Location:index.php");
    echo "<script>alert('刪除成功');
                window.location href = 'index.php';
    </script>";
    echo 1;
}else{
    header("Location:index.php");
    echo "<script>alert('稍後再試');
                window.location href = 'index.php';
    </script>";
    echo 0;
}
?>