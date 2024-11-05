<?php
//Se crean y usan variables de secion 
session_start();
require_once "conexion.php";
$email_usu=$_POST["email"];//se guarda el email enviado del formuliario
$clave_usu=$_POST["clave"];//se guarda la clave enviado del formulario
$tipo_usu=$_POST["tipo"];//se guarda el perfil enviada del formulario
$sql="SELECT * FROM usuario WHERE email='$email_usu' and clave='$clave_usu' and id_perfil=$tipo_usu";
//Se ejecuta la consulta
$result=$conex->query($sql);
if($result->num_rows>0){
    $fila=$result->fetch_assoc();
    if($fila["id_perfil"]==2){
        $_SESSION["emailalum"]=$fila["email"];
        $_SESSION["idusu"]=$fila["id_usu"];
    }
    if($fila["id_perfil"]==1){
        $_SESSION["emailbed"]=$fila["email"];
    }
    header("location:ingresar.php?mensaje=ok");
}else{
    header("location:ingresar.php?mensaje=error");
}
?>