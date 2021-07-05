<?php
include "./layout/header.php";
include "./class/database.php";
include "./class/city.php";
//新增城市物件
$city = new City();
//取得city資料陣列
$data = $city->getAllCity();
?>

<!--Bootstrap容器-->
<div class="container my-5">
    <div class="row">
        <div class="col">
            <!-- 網頁元件內容 -->
            <table id="city-table" class="table table-striped table-bordered table-hover" width="100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">城市名字</th>
                        <th scope="col">城市人口</th>
                        <th scope="col">國家代碼</th>
                        <th scope="col">編輯/刪除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td> <?= $row["id"] ?> </td>
                            <td> <?= $row["city_name"] ?> </td>
                            <td> <?= $row["population"] ?> </td>
                            <td> <?= $row["country_code"] ?> </td>
                            <td>
                                <a href="edit.php?id=<?= $row["id"] ?>" class="btn btn-outline-info">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button class="btn btn-outline-seconddary delete btn" delete-id="<?= $row["id"] ?>">
                                    <i class="fas fa-trash-alt"></i>
                                    <i class="fas fa-edit"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "./layout/footer.php"; ?>
</body>

</html>