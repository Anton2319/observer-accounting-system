<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();
if(!isset($_SESSION['login'])) {
    header("Location: /");
}
$fio = htmlspecialchars($_POST['FIO']);
$borndate = htmlspecialchars($_POST['borndate']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$registration_address = htmlspecialchars($_POST['registration_address']);

$sn = htmlspecialchars($_POST['sn']);
$issued = htmlspecialchars($_POST['issued']);
$issued_date = htmlspecialchars($_POST['issued_date']);
$SNILS = htmlspecialchars($_POST['SNILS']);
$INN = htmlspecialchars($_POST['INN']);

$bankname = htmlspecialchars($_POST['bankname']);
$bankINN = htmlspecialchars($_POST['bankINN']);
$bankBIK = htmlspecialchars($_POST['bankBIK']);
$bankKORRAcc = htmlspecialchars($_POST['bankKORRAcc']);
$receiver = htmlspecialchars($_POST['receiver']);
$personalAcc = htmlspecialchars($_POST['personalAcc']);
$card = htmlspecialchars($_POST['card']);

$db = mysqli_connect("localhost", "admin", "open2319", "consttest");
mysqli_set_charset($db, "utf8");

function countTable($tablename, $db) {
    //Переменную db не видно внутри функции
    $responce = mysqli_query($db, "SELECT COUNT(1) FROM `".$tablename."`");
    $responce = mysqli_fetch_array($responce)[0];
    return $responce;
}
$requestText = "INSERT INTO `observers`(`FIO`, `borndate`, `email`, `phone`, `registration_address`, `destrict_ID`, `observer_ID`) VALUES ('".$fio."','".$borndate."','".$email."','".$phone."','".$registration_address."',".$_SESSION['destrict_ID'].", ".countTable('observers', $db)."); 
INSERT INTO `observers_passportdata`(`sn`, `issued`, `issued_date`, `SNILS`, `INN`, `destrict_ID`, `observer_ID`) VALUES ('".$sn."','".$issued."','".$issued_date."', '".$SNILS."','".$INN."',".$_SESSION['destrict_ID'].", ".countTable('observers_passportdata', $db).");
INSERT INTO `observers_bankdata` (`bankname`, `INN`, `BIK`, `KORR_Account`, `receiver`, `receiver_personal_acc`, `card`, `destrict_ID`, `observer_ID`) VALUES ('".$bankname."','".$bankINN."','".$bankBIK."','".$bankKORRAcc."','".$receiver."','".$personalAcc."','".$card."',".$_SESSION['destrict_ID'].", ".countTable('observers_bankdata', $db).");";
echo $requestText;
$responce = mysqli_query($db, $requestText);
//Если произошла ошибка транзакции
if(!$responce) {
    echo("<br><h1>Ошибка добавления наблюдателя в базу данных, проверьте правильность заполнения всех полей!</h1>");
}
else {
    header("Location: index.php");
}
?>
