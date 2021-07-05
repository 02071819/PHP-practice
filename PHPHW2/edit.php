<?php
include "./class/database.php";
include "./class/city.php";
include "./class/country.php";
include "./layout/header.php";
$country = new Country();
$city = new City();
//將url的id參數設定給$city物件的id屬性 列表每個城市點編輯按鈕下個葉面根據不同的id對應該城市
$city->id = $_GET["id"];
$city->getOneCity();
$data = $country->getCode();
//如果點選送出按鈕 
if (isset($_POST["submit"])) {
    //把表單元件上的資料設定給物件中的屬性
    $city->cityName = $_POST["city-name"];
    $city->cityPop = $_POST["city-pop"];
    $city->countryCode = $_POST["country-code"];
}
?>

<!--表單元件-->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col">
            <!-- 表單元件 -->
            <!-- 網址根據id變化 所以要記錄id -->
            <form action="edit.php?id=<?= $_GET['id'] ?>" method="post">
                <!-- 城市 -->
                <div class="form-group">
                    <label for="city-name">城市名</label>
                    <input type="text" class="form-control" name="city-name" id="city-name" required value="<?= $city->cityName ?>">
                </div>
                <!-- 人口數 -->
                <div class="form-group">
                    <label for="city-pop">城市人口</label>
                    <input type="text" class="form-control" name="city-pop" id="city-pop" required value="<?= $city->cityPop ?>">
                </div>
                <!-- 國家代碼 -->
                <div class="form-group">
                    <label for="country-code">國家代碼</label>
                    <select class="form-control" name="country-code" id="country-code">
                        <?php foreach ($data as $row) : ?>
                            <!--如果在繪製的code和此筆資料的code一樣 就把選項預設被選取 身上加一個selected-->
                            <?php if ($row["country_code"] === $city->countryCode) : ?>
                                <option value="<?= $row["country_code"] ?>" selected>
                                    <?= $row["country_code"] ?>
                                </option>
                            <?php else : ?>
                                <option value="<?= $row["country_code"] ?>">
                                    <?= $row["country_code"] ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- 送出按鈕 -->
                <button type="submit" name="submit" class="btn btn-info">送出</button>
                <a href="./index.php" class="btn btn-outline-secondary">回首頁</a>
            </form>
            <?php
            //如果有點下送出按鈕
            if (isset($_POST["submit"])) {
                //呼叫$city update方法
                if ($city->update()) {
                    echo '<div class="alert alert-warning my-3" role="alert">
                                更新成功   
                            </div>';
                } else {
                    echo '<div class="alert alert-warning my-3" role="alert">
                                稍後再試
                            </div>';
                }
            }
            ?>
        </div>
        <?php include "./layout/footer.php"; ?>
    </div>
</div>