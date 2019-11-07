<?php
include_once '../includes/db.php';
$con = openCon('../config/db_login.ini');
$usr = $_POST['username'];
$pass = md5($_POST['password']);
$con->set_charset("utf-8");
$sql = "select * from users where(username='$usr' or email='$usr') and (password='$pass')";
$result = $con->query($sql);
$row = $result->fetch_assoc();
if ($row == null) {
    echo "<h1>Ingreso Invalido</h1>";
} else {
    session_start();
    $_SESSION['uname'] = $usr;
    $_SESSION['logueado'] = true;
    $_SESSION['time'] = date('H:i:s');
    header("location:welcome.php");
}
?>