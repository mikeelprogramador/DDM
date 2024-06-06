<?php

class Vista{
    
    public static function mostrarProductos(){
        include("bd-conect/inclucion-bd.php");
        $salida = ""; 
        $sql = "select * from tb_productos";
        $consulta = $conexion->query($sql);
        while($fila = $consulta->fetch_assoc()){
            $salida .= '<div class="home">';
            $salida .= '<div class="card" style="width: 18rem;">';
            $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicado">';
            $salida .= '<div class="card-body">';
            $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
            $salida .= '<p class="card-text">'.$fila['descripcion_producto'].'</p>';
            $salida .= '<a href="#" class="btn btn-primary">Comprar</a>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '</div>';
            $salida .= '<br><br>';
        }
        $conexion ->close();
        return $salida;
    }
}
