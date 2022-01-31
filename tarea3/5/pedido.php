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

       
        $carrito = $_SESSION["carrito"];
        $idUsuario=$_SESSION["id_usuario"];
        $total=0;
        //calculamos el total del pedido
        foreach ($carrito as $key => $articulo) {
        $total += $articulo["subtotal"];
        }
         //guardar pedido
         include "./dao/guardarPedido.php";

        foreach ($carrito as $key => $esp) {
          
           //guardar especialidad/pizza
           $idEspecialidad=$esp["id_especialidad"];
           $cantidad=$esp["cantidad"];
           $precio=$esp["precio"];
           if($esp["especialidad"]==true){// es una especialidad
            include "./dao/guardarPedidoEspecialidad.php";
           }else if($esp["especialidad"]==false){// pizza custom
            include "./dao/guardarPedidoPizza.php";
           }
          
        }
        //eliminar carrito
        unset($_SESSION["carrito"]);
        $_SESSION["msj"]="Pedido realizado correctamente";
       
    }
    header("Location: ./especialidades.php");
}
