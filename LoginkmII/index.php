<?php
session_start();
if(isset($_SESSION["emailbed"]) || isset($_SESSION["emailalum"])){
  if(isset($_SESSION["emailalum"])){
    header("location:inicio_alumno.php");
  }else{
    header("location:inicio_bedel.php");
  }
}
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
  
  <div class="container"> 
    <div class="card bg-white border-secondary mt-5 mb-5">  
    <div class="jumbotron">
    <div class="row mt-2 mb-5"> 

      <div class="text-center lead mt-5 mb-2"><h3><strong>Página Inicio del Sitio Web</strong></h3>

            
   </div> 
  

  </section>

  <?php
    include('footer.php');
  ?>
   
   <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>