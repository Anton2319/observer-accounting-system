<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: /");
}
$observer_ID = htmlspecialchars($_GET['id']);
if($observer_ID != $_GET['id']) {
    echo("<img src='accessdenited.jpg'>");
    exit(0);
}
$db = mysqli_connect("localhost", "admin", "open2319", "consttest");
mysqli_set_charset($db, "utf8");
$responce = mysqli_query($db, "SELECT * FROM `observers` WHERE observer_ID = ".$observer_ID);
$responce = mysqli_fetch_assoc($responce);
if($responce['destrict_ID'] != $_SESSION['destrict_ID']) {
    echo("<img src='accessdenited.jpg'>");
    exit(0);
}
$responce_passportdata = mysqli_query($db, "SELECT * FROM `observers_passportdata` WHERE observer_ID = ".$observer_ID);
$responce_passportdata = mysqli_fetch_assoc($responce_passportdata);

$responce_bankdata = mysqli_query($db, "SELECT * FROM `observers_bankdata` WHERE observer_ID = ".$observer_ID);
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
            <div class="col">
                <br>
                <a class="btn btn-primary" href="index.php">Назад</a>
                <br>
                <br>
                <h3><b>ФИО: </b><?php echo $responce['FIO'] ?></h3>
                <h3><b>Дата рождения: </b><?php echo $responce['borndate'] ?></h3>
                <h3><b>Электронная почта: </b><?php echo $responce['email'] ?></h3>
                <h3><b>Телефон: </b><?php echo $responce['phone'] ?></h3>
                <h3><b>Адрес постоянной регистрации: </b><?php echo $responce['registration_address'] ?></h3>
                <br>
                <h1>Паспорт</h1>
                <h3><b>Серия / Номер</b> <?php echo $responce_passportdata['sn'] ?></h3>
                <h3><b>Выдан</b> <?php echo $responce_passportdata['issued'] ?></h3>
                <h3><b>Дата выдачи</b> <?php echo $responce_passportdata['issued_date'] ?></h3>
                <h3><b>СНИЛС</b> <?php echo $responce_passportdata['SNILS'] ?></h3>
                <h3><b>ИНН</b> <?php echo $responce_passportdata['INN'] ?></h3>
                <br>
                <h1>Банковские реквизиты</h1>
                <h3><b>Название банка: </b> <?php echo $responce_bankdata['bankname'] ?></h3>
                <h3><b>ИНН : </b> <?php echo $responce_bankdata['INN'] ?></h3>
                <h3><b>БИК: </b> <?php echo $responce_bankdata['BIK'] ?></h3>
                <h3><b>Корреспондентский счёт: </b> <?php echo $responce_bankdata['KORR_Account'] ?></h3>
                <h3><b>Получатель: </b> <?php echo $responce_bankdata['receiver'] ?></h3>
                <h3><b>Лицевой счёт получателя: </b> <?php echo $responce_bankdata['receiver_personal_acc'] ?></h3>
                <h3><b>Карта или другое средство оплаты: </b> <?php echo $responce_bankdata['card'] ?></h3>
                <a class="btn btn-outline-primary" href="edit.php?id=<?php echo $responce['observer_ID'] ?>">Изменить данные</a>
                <br>
                <br>
            </div>
        </div>
    </div>
</body>
</html>
