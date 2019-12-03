<!doctype html>
<html lang="en">
<head>
	<link rel= "stylesheet" href="../css/bootstrap.min.css" />
	<link rel= "stylesheet" href="../css/menu.css" />
	<link rel= "stylesheet" href="../css/fontawesome.css" />
	<link rel= "stylesheet" href="../css/all.css" />
	<meta charset="UTF-8" />
	<title>Document</title>
</head>

<body>
<?php
session_start();
if ($_SESSION['logueado']) {
    echo "BIENVENID@, " .$_SESSION['uname']."<br/>";
    echo "Hora de conexión: " .$_SESSION['time']."<br/>";
    echo "<a href=' Logout.php'> Logout</a>";
} else
    header("location:../form_login.html");
?>    

    <h1 class='text-center'>Opciones de menú</h1>
    <div id="container">
        <a href='insert_products.php' class="btn-action" style=display:flex;justify-content:center;><i class="fas fa-plus-circle fa-2x"></i>Agregar productos</a>
        <a href='list_products.php' class="btn-action" style=display:flex;justify-content:center;><i class="fas fa-edit fa-2x"></i>Editar productos</a>
        <a href='list_products.php' class="btn-action" style=display:flex;justify-content:center;><i class="fas fa-minus-circle fa-2x"></i>Eliminar productos</a>
	</div>

</body>
</html>
