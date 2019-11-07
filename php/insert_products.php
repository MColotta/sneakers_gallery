<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/form.css" />
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">Ingreso de producto</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8" action="save_products.php" method="post" enctype="multipart/form-data">
				
					<div class="form-group">
						<label for="" class="control-label">Marca</label>
						<select  class="form-control" name="marca" id="marca">
						<!-- se cargan las marcas desde una tabla viteh -->
							<?php 
							include_once '../includes/db.php';
							
							//$con es una conexion
							$con = openCon('../config/db_products.ini');
							$con -> set_charset("utf8mb4");
							$sql = "select * from brands order by description;";
							$result = $con -> query($sql);
							while($row = $result -> fetch_assoc())
							{
							    //echo "<option>".$row['description']."</option>";
							    echo '<option value=" '.$row['id_brand'].' ">'.$row['description']."</option>";
							}
							?>
						</select>
					</div>

					<div class="form-group">
						<label for="" class="control-label">Modelo</label>
						<input type="text" class="form-control" placeholder="modelo" required name="modelo" id="modelo" />
					</div>
					
							<div class="form-group">
						<label for="" class="control-label">Color</label>
						<select  class="form-control" name="color" id="color">
						<!-- se cargan los colores desde una tabla viteh -->
							<?php 
							include_once '../includes/db.php';
							
							//$con es una conexion
							$con = openCon('../config/db_products.ini');
							$con -> set_charset("utf8mb4");
							$sql = "select * from colors order by description;";
							$result = $con -> query($sql);
							while($row = $result -> fetch_assoc())
							{
							   // echo "<option>".$row['description']."</option>";
							    echo '<option value=" '.$row['id_color'].' ">'.$row['description']."</option>";
							}
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label">Precio</label>
						<input type="text" class="form-control" placeholder="precio" required name="precio" id="precio" />
					</div>
					
					<div class="form-group">
						<label for="" class="control-label">Observación</label>
						<textarea class="form-control" rows="3" placeholder="observacion" name="observacion" id="observacion"></textarea>
					</div>
					
					<div class="form-group">
						<label class="control-label">Cargar imagen</label>
						<input type="file" class="form-control-file" name="imagen" id="imagen" size="30" />
						<div class="text-center">
							<input	type="submit" class="btn btn-success" value="aceptar" />
						</div>
					</div>
					
				</form>
				
			</div>
		</div>
	</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../js/bootstrap.min.css"></script>
</body>
</html>
