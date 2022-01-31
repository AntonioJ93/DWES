<?php session_start();

include "./dao/conexion.php";

if (!isset($_SESSION["id_usuario"])) {
    // si no hay usuario
    header("Location: actividad5.php");
} else {


    if($_SESSION["rol"]=="admin"){
        header("Location:./pedidos.php");
    }

    //obtener pizza
    if (isset($_SESSION["pizza"])) {
        $precio=0.5 * count($_SESSION["pizza"]) + 7;
        //guardar pizza
        include "./dao/guardarPizza.php";

        foreach ($_SESSION["pizza"] as $key => $value) {
            $idIngrediente=$value;
             //guardar Ingredientes de la pizza
        include "./dao/guardarIngredientesPizza.php";
        }
       
        include "./dao/buscarUltimaPizza.php";
        //añadir al carrito
        if(isset($_SESSION["carrito"])){
            $carritoCustom=$_SESSION["carrito"];
            array_push(
                $carritoCustom,
                array(
                    "id_especialidad" => $ultimaPizza[0], 
                    "nombre" => "Pizza personalizada", 
                    "precio" => $ultimaPizza["precio"], 
                    "cantidad" => 1,
                    "subtotal"=>$ultimaPizza["precio"],
                    "especialidad"=>false
                )
            );
            //borramos la pizza de sesion
            unset($_SESSION["pizza"]);
            //actualizas la variable de la sesion
            $_SESSION["carrito"] = $carritoCustom;
            $_SESSION["msj"]="Añadido correctamente";
            header("Location:./carrito.php");
        }else{
            $carritoCustom=array();
            array_push(
                $carritoCustom,
                array(
                    "id_especialidad" => $ultimaPizza[0], 
                    "nombre" => "Pizza personalizada", 
                    "precio" => $ultimaPizza["precio"], 
                    "cantidad" => 1,
                    "subtotal"=>$ultimaPizza["precio"],
                    "especialidad"=>false
                )
            );
            //borramos la pizza de sesion
            unset($_SESSION["pizza"]);
            //actualizas la variable de la sesion
            $_SESSION["carrito"] = $carritoCustom;
            $_SESSION["msj"]="Añadido correctamente";
            header("Location:./carrito.php");
        }
       
    }
}

?>