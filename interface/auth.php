<?php
$login = htmlspecialchars($_POST['login']);
$password = htmlspecialchars($_POST['password']);
//на случай если была попытка SQL инъекции
if($login!=$_POST['login']||$password!=$_POST['password']) {
    echo("<img src='accessdenited.jpg'>");
    exit(0);
}
$db = mysqli_connect("localhost", "admin", "open2319", "consttest");
$responce = mysqli_query($db, "SELECT * FROM `userdata` WHERE login='".$login."'");
$responce = mysqli_fetch_assoc($responce);
if($responce['password']==$password) {
    session_start();
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    header("Location: index.php");
}
else {
    echo("Ошибка авторизации");
}
?>
