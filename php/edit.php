<?php 
session_start();
if ($_SESSION['logueado']) {
    include_once '../includes/db.php';
    $con = openCon('../config/db_products.ini');
    $con->set_charset("utf8mb4");
    
    $idUp = $_GET['q'];
    $sql = "select brands.description as marcades, brands.id_brand as marcaid, colors.description as colordes, colors.id_color as colorid, sneakers.id_sneakers as idzapa, sneakers.model as modelo, sneakers.observation as observacion, sneakers.price as precio from sneakers inner join brands on sneakers.id_brands = brands.id_brand inner join colors on sneakers.id_colors = colors.id_color where sneakers.id_sneakers = " . $idUp;
    $result = $con-> query ($sql); //ejecuta el comando sql
    $row = $result -> fetch_assoc(); //recorre el resultado de la info obtenida con el sql
} //cierre del if
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Documente</title>
	<link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/form.css" />
</head>

<body>
	<div class="container">
		<div class="row">
		
			<div class="col-md-12">
				<h3 class="text-center">Actualizar producto</h3>
			</div>
			
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8" action="update_products.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo $row['idzapa'] ?>" /> <!-- para guardar en el form el id de la zapatilia -->
					</div>
					
					<div class="form-group">
    					<label for="" class="control-label">Modelo</label>
    						<input type="text" class="form-control" value="<?php echo $row['modelo']?>" name="modelo" id="modelo" />
					</div>
					
					<div class="form-group">
    					<label for="" class="control-label">Precio</label>
    						<input type="text" class="form-control" value="<?php echo $row['precio']?>" name="precio" id="precio" />
					</div>
					
					<div class="form-group">
						<label for="" class="control-label">Observación</label>
						<textarea class="form-control" rows="3" placeholder="observacion" name="observacion" id="observacion">
							<?php echo $row['observacion']?>
						</textarea>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label">Marca</label>
						<select  class="form-control" name="marca" id="marca">
							<option value="<?php echo $row['marcaid']?>"> <?php echo $row['marcades']?> </option>
							<?php
							$sqlBrand = "select id_brand as idmarca, description as desmarca from brands order by description;";
							$resultBrand = $con-> query ($sqlBrand);
							//$rowBrand = $result -> fetch_assoc();
							while($rowBrand = $resultBrand -> fetch_assoc()){
							     if ($row['marcaid'] != $rowBrand['idmarca']){
							         ?>
							         <option value="<?php echo $rowBrand['idmarca']?>"> <?php echo $rowBrand['desmarca'] ?> </option>
							         <?php			         
							     } //cierre del if
							} //cierre del while
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label for="" class="control-label">Color</label>
						<select  class="form-control" name="color" id="color">
							<option value="<?php echo $row['colorid']?>"> <?php echo $row['colordes']?> </option>
							<?php 
							$sqlColor = "select id_color as idcolor, description as descolor from colors order by description;";
							$resultColor = $con-> query ($sqlColor);
							//$rowColor = $resultColor -> fetch_assoc();
							while($rowColor = $resultColor -> fetch_assoc()){
							    if ($row['colorid'] != $rowColor['idcolor']){
							        ?>
							         <option value="<?php echo $rowColor['idcolor'] ?>"> <?php echo $rowColor['descolor'] ?> </option>
							         <?php 
							     } //cierre del if
							}//cierre del while
							?>
						</select>
					</div>
					
					<div class="text-center">
    					<br />
    					<input type="submit" class="btn btn-success" value="Guardar Producto" />
					</div>
					
				</form>
			</div>
		</div>
	</div>
</body>
</html>