<?php
session_start();
if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    //print_r($_POST); //usar para debuggear
    
$idzapa = $_POST['id'];
$model = $_POST['modelo'];
$price = $_POST['precio'];
$observation = $_POST['observacion'];
$brand = $_POST['marca'];
$color = $_POST['color'];

$sql = "update sneakers set model = '$model', price = '$price', observation = '$observation', id_colors = '$color', id_brands = '$brand' where id_sneakers =".$idzapa;
$result = $con-> query ($sql); //ejecuta el comando sql que esta dentro de la variable $sql
header ('location: list_products.php');
} //cierre del if
?>