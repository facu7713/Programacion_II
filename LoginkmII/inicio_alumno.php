<?php
session_start();
if(!isset($_SESSION["emailbed"]) && !isset($_SESSION["emailalum"])){
    header("location:index.php");
}elseif(isset($_SESSION["emailbed"])){
    header("location:inicio_bedel.php");
}
require_once "conexion.php";
$id_usu=$_SESSION["idusu"];
$sql="SELECT CONCAT(persona.nombre,' ',persona.apellido) as Nombre_Alunmno, persona.dni AS DNI, persona.telefono as Telefono, carrera.nombre AS CARRERA, inscripcion.fecha_ins AS Fecha_Inscripcion
FROM persona, carrera, inscripcion
WHERE (persona.id_pers=inscripcion.id_pers) AND (carrera.id_carrer=inscripcion.id_carrer) AND (persona.idusu=$id_usu);";
$result = $conex->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
 
      <?php
        include('header.php');

      ?>
      
            
    
   <!-- Index.php contiene la página Inicial de un Sitio Web--> 

      
  <section>
  
  <div class="container text-center">
        <div class="text-center mt-5 mb-3"><h3>Listado de Productos</h3></div>
        
        <table class="table table-striped table-hover">

            <thead>
                <tr>
                <th scope="col">Nombre Alumno</th>
                <th scope="col">DNI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Nombre Carrera</th>
                <th scope="col">Fecha_Inscripción</th>
                </tr>
            </thead>
        
            <?php

            // Se evalúa si el resultado de la consulta es mayor a cero
            if ($result->num_rows>0){

            ?>

            <tbody>

            <?php

                /* Mientras existan resultados mayores a cero se guardan en un arreglo asociativo llamado $fila */

                While ($fila=$result->fetch_assoc()){
    
            ?>
               <tr>
                    
               <th scope="row"><?php echo $fila["Nombre_Alunmno"]; ?></th>
               <td><?php echo $fila["DNI"]; ?></td>
               <td><?php echo $fila["Telefono"]; ?></td>
               <td><?php echo $fila["CARRERA"]; ?></td>
               <td><?php echo $fila["Fecha_Inscripcion"]; ?></td>
               </tr>
                

            <?php
            // Cierra el While
            }
            ?>         
            
            </tbody>
      
       </table></div>

	   <?php

	    }else{

          // Si el resultado de la consulta es cero 

          echo "</table></div>";
          echo "<div class='container text-center lead my-3 py-3'><div class='alert alert-danger my-5 py-4'><p><em>No existen Productos! </em></p></div></div>";
         }
	   ?>  

  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>