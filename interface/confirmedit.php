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
$destrict_ID = htmlspecialchars($_POST['destrict_ID']);
$observer_ID = htmlspecialchars($_GET['id']);

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
mysqli_query($db, "SET autocommit=0");
mysqli_query($db, "START TRANSACTION");
if($_SESSION['privileges_level']>=2) {
    $responce = mysqli_query($db, "UPDATE `observers` SET `FIO`='".$fio."',`borndate`='".$borndate."',`email`='".$email."',`phone`='".$phone."',`registration_address`='".$registration_address."',destrict_ID=".$SESSION['destrict_ID']." WHERE observer_ID = ".$observer_ID);
    if($responce['destrict_ID'] != $_SESSION['destrict_ID']) {
        mysqli_query($db, "ROLLBACK");
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce = mysqli_query($db, "UPDATE `observers` SET `FIO`='".$fio."',`borndate`='".$borndate."',`email`='".$email."',`phone`='".$phone."',`registration_address`='".$registration_address."',`destrict_ID`=".$destrict_ID." WHERE observer_ID = ".$observer_ID);
}
if($_SESSION['privileges_level']>=2) {
    $responce_passportdata = mysqli_query($db, "UPDATE `observers_passportdata` SET `sn`='".$sn."',`issued`='".$issued."',`issued_date`='".$issued_date."',`SNILS`='".$SNILS."',`INN`='".$inn."',destrict_ID='".$destrict_ID."' WHERE observer_ID = ".$observer_ID);
    if($responce_passportdata['destrict_ID'] != $_SESSION['destrict_ID']) {
        mysqli_query($db, "ROLLBACK");
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce_passportdata = mysqli_query($db, "UPDATE `observers_passportdata` SET `sn`='".$sn."',`issued`='".$issued."',`issued_date`='".$issued_date."',`SNILS`='".$SNILS."',`INN`='".$INN."',destrict_ID='".$_SESSION['destrict_ID']."' WHERE observer_ID = ".$observer_ID);
}
if($_SESSION['privileges_level']>=2) {
    $responce_bankdata = mysqli_query($db, "UPDATE `observers_bankdata` SET `bankname`='".$bankname."',`INN`='".$bankINN."',`BIK`='".$bankBIK."',`KORR_Account`='".$KORR_Account."',`receiver`='".$receiver."',`receiver_personal_acc`='".$receiver_personal_acc."',`card`='".$card."',`destrict_ID`=".$destrict_ID." WHERE observer_ID = ".$observer_ID);
    if($responce_bankdata['destrict_ID'] != $_SESSION['destrict_ID']) {
        mysqli_query($db, "ROLLBACK");
        echo("<img src='accessdenited.jpg'>");
        exit(0);
    }
}
else {
    $responce_bankdata = mysqli_query($db, "UPDATE `observers_bankdata` SET `bankname`='".$bankname."',`INN`='".$bankINN."',`BIK`='".$bankBIK."',`KORR_Account`='".$bankKORRAcc."',`receiver`='".$receiver."',`receiver_personal_acc`='".$personalAcc."',`card`='".$card."', destrict_ID=".$_SESSION['destrict_ID']." WHERE observer_ID = ".$observer_ID);
}
if($responce&&$responce_passportdata&&$responce_bankdata) {
    mysqli_query($db, "COMMIT");
    header("Location: index.php");
}
else {
    echo("<br><h1>Ошибка изменения данных наблюдателя, проверьте правильность заполнения всех полей!</h1>");
    mysqli_query($db, "ROLLBACK");
}
?>
