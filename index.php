<?php
include 'planilla.php';
require 'conexion.php';

$query="SELECT IdEmpleado,Apellido,Nombre,Cargo,Sueldo,Fingreso FROM Empleados";
$resultado=$mysqli->query($query);

if(isset($_POST['create_pdf'])){
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'CODIGO',1,0,'C',1);
$pdf->Cell(30,6,'APELLIDO',1,0,'C',1);
$pdf->Cell(30,6,'NOMBRE',1,0,'C',1);
$pdf->Cell(30,6,'CARGO',1,0,'C',1);
$pdf->Cell(30,6,'SUELDO',1,0,'C',1);
$pdf->Cell(30,6,'FECHA',1,1,'C',1);
$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc()){

	$pdf->Cell(20,6,$row['IdEmpleado'],1,0,'C',1);
	$pdf->Cell(30,6,$row['Apellido'],1,0,'C',1);
	$pdf->Cell(30,6,$row['Nombre'],1,0,'C',1);
    $pdf->Cell(30,6,$row['Cargo'],1,0,'C',1);
    $pdf->Cell(30,6,$row['Sueldo'],1,0,'C',1);
    $pdf->Cell(30,6,$row['Fingreso'],1,1,'C',1);
}

$pdf->Output();
}
if(isset($_POST['btn1']))
    {
      
      
      $id= $_POST['id'];
      $apellido = $_POST['apellido'];
      $nombre= $_POST['nombre'];
      $cargo= $_POST['cargo'];
      $sueldo= $_POST['sueldo'];
      $fecha=$_POST['fecha'];

      mysqli_query($mysqli, "INSERT INTO Empleados (IdEmpleado,Apellido,Nombre,Cargo,Sueldo,Fingreso) values ('$id','$apellido','$nombre','$cargo','$sueldo','$fecha')");
      
         echo "<script> Se registro correctamente </script>";
    }






?>
<!DOCTYPE html>
<html lang="utf-8">
<head>
	<meta charset="utf-8">
	<title>Exportar pdf</title>
	<meta name="viewport" content="width=device-width,
	user-scalable=no,initial-scale=1.0,maximun-scale=1.0
	 ,minimum-scale=1.0">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body style="margin: 40px;">
 <div class="conteiner-fluid">
 	<div class="row padding">
 		<div class="col-md-12">
 			<?php
              $h1 ="Reporte de Empleados -Enero 2018";
              echo '<h1>'.$h1.'</h1>'
 			?>
 		</div>
 	</div>
<form method="POST">
 
 <div class="form-group">
      Id :<input type="text" name="id" class="form-control">
   </div>

  <div class="form-group">
      apellido :<input type="text" name="apellido" class="form-control" >
  </div>
   <div class="form-group">
      nombre :<input type="text" name="nombre" class="form-control" >
  </div>
   <div class="form-group">
      cargo :<input type="text" name="cargo" class="form-control" >
  </div>
   <div class="form-group">
      sueldo :<input type="text" name="sueldo" class="form-control">
  </div>
   <div class="form-group">
      fecha ingreso :<input type="text" name="fecha" class="form-control" >
  </div>
    
    <center>
      <input type="submit" value="Grabar" class="btn btn-success" name="btn1">
    </center>
</form>



 	<div class="row">
 		<table class="table table-hover">
 			<thead>
 				 <tr>
 				 	<th>Id</th>
 				 	<th>Apellido</th>
 				 	<th>Nombre</th>
 				 	<th>Cargo</th>
                    <th>Sueldo</th>
                    <th>Fecha</th>
 				 </tr>
 			</thead>
            <tbody>
            	
            	<?php
             while($row =$resultado->fetch_assoc()){
             	?>
             	<tr>
             	<td><?php echo $row['IdEmpleado']?></td>
             	<td><?php echo $row['Apellido']?></td>
             	<td><?php echo $row['Nombre']?></td>
             	<td><?php echo $row['Cargo']?></td>
                <td><?php echo $row['Sueldo']?></td>
                <td><?php echo $row['Fingreso']?></td>
                </tr>
                <?php
             }

            	?>
            </tbody>
 		</table>

 		<div class="col-md-12">
 			<form method="post">
 				<input type="hidden" name="reporte_name" value="<?php echo $h1 ; ?>">
 				<input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar Reporte">
 			</form>
 		</div>
 	</div>
 </div>
</body>
</html>