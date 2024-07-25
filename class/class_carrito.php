<?php 
class Carrito{

    public static function mostrarCarrito($des,$id_user){
        include_once("class_encript.php");
        include_once("../../conf/model.php");
        include_once("class_funciones.php");
        include_once("class_carrito.php");
        $salida = "";
        $consulta = Model::sqlMostrarCarrito($des,$id_user);
        if ($consulta->num_rows == 0) {
            $salida = 0;
        }else{
            while($fila = $consulta->fetch_assoc()){
                $id = id::encriptar($fila['id_producto']);
                $valor = Funciones::intDinero($fila['precio']);
                $cantidad = floatval($fila['cantidad_de_productos']);
                if($fila['cantidades'] == 0){
                    $carrito = Carrito::buscarCarrito($id_user);
                    Model::sqlEliminarDelCarrito($carrito,$fila['id_producto']);
                    header("location: ddm.php?seccion=carrito");
                }
                $salida .= '<div class="container mt-4">'; 
                $salida .= '<div class="row">';
                $salida .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">'; 
                $salida .= '<div class="card h-100" style="width: 100%;">';  
                $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicada">';
                $salida .= '<div class="card-body d-flex flex-column">';
                $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
                $salida .= '<p class="card-text">COP $ '.$fila['precio'].'</p>';
                $salida .= "<button class='btn btn-primary' type='button' id='incremento' onclick='sumarCantidad(\"$id\",\"{$cantidad}\",\"{$fila['cantidades']}\")'>+</button>";
                $salida .= '<input type="number" id="cantidad" class="form-control" value="'.$cantidad.'" min="1" max="'.$fila['cantidades'].'" disabled>';
                $salida .= "<button class='btn btn-primary' type='button' id='decremento' onclick='restarCantidad(\"$id\",\"{$cantidad}\")'>-</button>";
                $salida .= '<p class="card-text"> Valor total: '.Funciones::strDinero($valor*$cantidad).'</p>';
                $salida .= "<button class='btn btn-primary mt-auto' onclick='eliminarDelCarrito(\"$id\")'>Eilimar del carrtio</button>";
                $salida .= '</div>';
                $salida .= '</div>';
                $salida .= '</div>';
                $salida .= '</div>'; 
                $salida .= '</div>';
            }
        }
        return $salida;
    }

    public static function crearCarrito($id_user){
        include_once("../../conf/model.php");
        $consulta = Model::sqlCarrito(1,$id_user);
    }

    public static function verificarCarrito($id_user){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlCarrito(2,$id_user);
        while($fila = $consulta->fetch_array()){
            $salida += $fila[0];
        }
        return $salida;
    }

    public static function agregarAlCarrito($carrito,$id_pro,$cantidad){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlAgregarCarrito($carrito,$id_pro,$cantidad);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function buscarCarrito($id_user){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlBuscarCarrito($id_user);  
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }

    public static function dinero($des,$id_user){
        include_once("../../conf/model.php");
        include_once("class_funciones.php");
        $salida = 0;
        $consulta = Model::sqlMostrarCarrito($des,$id_user);
        while($fila = $consulta->fetch_array()){
            $valor = Funciones::intDinero($fila[7]);
            $salida += $valor*floatval($fila[13]);
        }
        return $salida;
    }

    public static function aumentarCantidad($des,$carrito,$id_pro){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlAumentarCantidad($des,$carrito,$id_pro);
        if($consulta){
            $salida = 1;
        }
        return $salida;
    }

    public static function restriccionCarrito($id_user,$id_pro){
        include_once("../../conf/model.php");
        $salida = 0;
        $consulta = Model::sqlRestriccionCarrito($id_user,$id_pro);
        while($fila = $consulta->fetch_array()){
            if($fila[0] >0){
                //si salida es 1 es porque este producto ya esta en el carrito
                $salida = 1;
            }   
        }
        return $salida;
    }


}