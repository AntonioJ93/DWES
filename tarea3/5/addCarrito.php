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
        if (isset($_GET["idEspecialidad"])) {
            $idEspecialidad = $_GET["idEspecialidad"];
            $carrito = $_SESSION["carrito"];
            $existeEspecialidad = false;
            //buscar
            foreach ($carrito as $key => $esp) {
                if ($esp["id_especialidad"] == $idEspecialidad) {
                    //suma uno
                    $esp["cantidad"] += 1;
                    $esp["subtotal"] = $esp["precio"] * $esp["cantidad"];
                    $carrito[$key] = $esp;
                    $existeEspecialidad = true;

                    //actualizas la variable de la sesion
                    $_SESSION["carrito"] = $carrito;
                    $_SESSION["msj"] = "Añadido correctamente";
                }
            }
            //no lo ha encontrado
            include "./dao/buscarEspecialidadPorId.php";

            if (!$existeEspecialidad) {
                //add especialidad
                array_push(
                    $carrito,
                    array(
                        "id_especialidad" => $especialidad["id_especialidad"],
                        "nombre" => $especialidad["nombre"],
                        "precio" => $especialidad["precio"],
                        "cantidad" => 1,
                        "subtotal" => $especialidad["precio"],
                        "especialidad" => true
                    )
                );
                //actualizas la variable de la sesion
                $_SESSION["carrito"] = $carrito;
                $_SESSION["msj"] = "Añadido correctamente";
            }
        } else {
            //no han llegado datos en la url
            header("Location:./especialidades.php");
        }
    } else {
        //no hay carrito
        //add especialidad

        if (isset($_GET["idEspecialidad"])) {
            $idEspecialidad = $_GET["idEspecialidad"];
            //buscar
            include "./dao/buscarEspecialidadPorId.php";
            $carrito = array();
            array_push(
                $carrito,
                array(
                    "id_especialidad" => $especialidad["id_especialidad"], 
                    "nombre" => $especialidad["nombre"], 
                    "precio" => $especialidad["precio"], 
                    "cantidad" => 1, 
                    "subtotal" => $especialidad["precio"], 
                    "especialidad" => true
                )
            );
            //actualizas la variable de la sesion
            $_SESSION["carrito"] = $carrito;
            $_SESSION["msj"] = "Añadido correctamente";
        } else {
            //no han llegado datos en la url
            $_SESSION["error"] = "Ha ocurrido un error";
            header("Location:./especialidades.php");
        }
    }
    header("Location: ./especialidades.php");
}
