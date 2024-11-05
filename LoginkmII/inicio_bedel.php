<?php
session_start();
if(!isset($_SESSION["emailbed"]) && !isset($_SESSION["emailalum"])){
    header("location:index.php");
}elseif(isset($_SESSION["emailalum"])){
    header("location:inicio_alumno.php");
}
require_once "conexion.php";
$sql="SELECT CONCAT(persona.nombre,' ',persona.apellido) as Nombre_Alunmno, inscripcion.fecha_ins as Fecha_Inscripcion, carrera.nombre as Nombre_Carrera 
FROM carrera, persona, inscripcion
WHERE (persona.id_pers=inscripcion.id_pers) AND (carrera.id_carrer=inscripcion.id_carrer);";
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
                <th scope="col">Fecha Inscripción</th>
                <th scope="col">Nombre Carrera</th>
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
               <td><?php echo $fila["Fecha_Inscripcion"]; ?></td>
               <td><?php echo $fila["Nombre_Carrera"]; ?></td>
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