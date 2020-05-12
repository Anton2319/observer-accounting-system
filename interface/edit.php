<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: /");
}
$observer_ID = htmlspecialchars($_GET['id']);
$db = mysqli_connect("localhost", "admin", "open2319", "consttest");
mysqli_set_charset($db, "utf8");
if($_SESSION['privileges_level']>=2) {
    $responce = mysqli_query($db, "SELECT * FROM `observers` WHERE observer_ID = ".$observer_ID);
    if($responce['destrict_ID'] != $_SESSION['destrict_ID']) {
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce = mysqli_query($db, "SELECT * FROM `observers` WHERE observer_ID = ".$observer_ID);
}
$responce = mysqli_fetch_assoc($responce);
if($_SESSION['privileges_level']>=2) {
    $responce_passportdata = mysqli_query($db, "SELECT * FROM `observers_passportdata` WHERE observer_ID = ".$observer_ID);
    if($responce_passportdata['destrict_ID'] != $_SESSION['destrict_ID']) {
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce_passportdata = mysqli_query($db, "SELECT * FROM `observers_passportdata` WHERE observer_ID = ".$observer_ID);
}
$responce_passportdata = mysqli_fetch_assoc($responce_passportdata);
if($_SESSION['privileges_level']>=2) {
    $responce_bankdata = mysqli_query($db, "SELECT * FROM `observers_bankdata` WHERE observer_ID = ".$observer_ID);
    if($responce_bankdata['destrict_ID'] != $_SESSION['destrict_ID']) {
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce_bankdata = mysqli_query($db, "SELECT * FROM `observers_bankdata` WHERE observer_ID = ".$observer_ID);
}
$responce_bankdata = mysqli_fetch_assoc($responce_bankdata);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">Система учета наблюдателей</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col formblock">
                <br>
                <h1>Изменение данных наблюдателя</h1>
                <form action="confirmedit.php?id=<?php echo $observer_ID ?>" method="post">
                    <input type="text" name="FIO" class="form-control" placeholder="ФИО" value = "<?php echo $responce['FIO'] ?>"><br>
                    <input type="text" name="borndate" class="form-control" placeholder="Дата рождения" value = "<?php echo $responce['borndate'] ?>"><br>
                    <input type="text" name="email" class="form-control" placeholder="Электронная почта" value = "<?php echo $responce['email'] ?>"><br>
                    <input type="text" name="phone" class="form-control" placeholder="Телефон" value = "<?php echo $responce['phone'] ?>"><br>
                    <input type="text" name="registration_address" class="form-control" placeholder="Адрес постоянной регистрации" value = "<?php echo $responce['registration_address'] ?>">
                    <br>
                    <?php
                    if($_SESSION['privileges_level']<2) {
                        echo('<input type="text" name="destrict_ID" class="form-control" placeholder="Регион" value="'.$responce['destrict_ID'].'">');
                    }
                    ?>
                    <br>
                    <h1>Паспорт</h1>
                    <input type="text" name="sn" class="form-control" placeholder="Серия / Номер" value = "<?php echo $responce_passportdata['sn'] ?>"><br>
                    <input type="text" name="issued" class="form-control" placeholder="Выдан" value = "<?php echo $responce_passportdata['issued'] ?>"><br>
                    <input type="text" name="issued_date" class="form-control" placeholder="Дата выдачи" value = "<?php echo $responce_passportdata['issued_date'] ?>"><br>
                    <input type="text" name="SNILS" class="form-control" placeholder="СНИЛС" value = "<?php echo $responce_passportdata['SNILS'] ?>"><br>
                    <input type="text" name="INN" class="form-control" placeholder="ИНН" value = "<?php echo $responce_passportdata['INN'] ?>"><br>
                    <br>
                    <h1>Банковские реквизиты</h1>
                    <input type="text" name="bankname" class="form-control" placeholder="Название банка" value = " <?php echo $responce_bankdata['bankname'] ?>"><br>
                    <input type="text" name="bankINN" class="form-control" placeholder="ИНН" value = " <?php echo $responce_bankdata['INN'] ?>"><br>
                    <input type="text" name="bankBIK" class="form-control" placeholder="БИК" value = " <?php echo $responce_bankdata['BIK'] ?>"><br>
                    <input type="text" name="bankKORRAcc" class="form-control" placeholder="Корреспондентский счёт" value = " <?php echo $responce_bankdata['KORR_Account'] ?>"><br>
                    <input type="text" name="receiver" class="form-control" placeholder="Получатель" value = " <?php echo $responce_bankdata['receiver'] ?>"><br>
                    <input type="text" name="personalAcc" class="form-control" placeholder="Лицевой счёт получателя" value = " <?php echo $responce_bankdata['personalAcc'] ?>"><br>
                    <input type="text" name="card" class="form-control" placeholder="Карта или другое средство оплаты" value = " <?php echo $responce_bankdata['card'] ?>"><br>
                    <input type="submit" class="form-control btn btn-primary" value="Сохранить изменения">
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
