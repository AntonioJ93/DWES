<?php session_start();

include "./dao/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
} else {

    if($_SESSION["rol"]=="admin"){
        header("Location:./pedidos.php");
    }


    //comprobamos si existe el carrito
    if (isset($_SESSION["carrito"])) {
        //hay carrito
        //comprobamos si tenemos esa especialidad en el carrito
        if (isset($_GET["idEspecialidad"])&&isset($_GET["especialidad"])) {
            $idEspecialidad = $_GET["idEspecialidad"];
            $carrito = $_SESSION["carrito"];
            $existeEspecialidad = false;
            //buscar
            foreach ($carrito as $key => $esp) {
                if ($esp["id_especialidad"] == $idEspecialidad&& $esp["especialidad"]==$_GET["especialidad"]) {
                    //elimina
                    unset($carrito[$key]);
                   
                    //actualizas la variable de la sesion
                    $_SESSION["carrito"] = $carrito;
                    $_SESSION["msj"]="Eliminado correctamente";
                    
                }
            }
           
        } else {
            //no han llegado datos en la url
            header("Location:./carrito.php");
        }
    }
    header("Location:./carrito.php");
}