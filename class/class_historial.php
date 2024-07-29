<?php 

class Historial{

    public static function agregarHistorial($id_user,$id_pro){
        include_once("../../conf/model.php");
        $consulta = Model::sqlAgregarHistorial($id_user,$id_pro);      
    }

    public static function verHistorial($id_user){
        include_once("../../conf/model_vista.php");
        include_once("class_fechas.php");
        $salida = '<div class="container mt-4">'; 
        $salida .= '<div class="row">';
        $consulta = ModelVista::sqlVerHistorial($id_user);
        if ($consulta->num_rows == 0) {
            $salida = 0;
        }else{
            while ($fila = $consulta->fetch_assoc()) {
                $salida .= '<div class="col-sm-6 col-md-4 col-lg-3 mb-4">'; 
                $salida .= '<div class="card h-100" style="width: 100%;">';  
                $salida .= '<img src="'.$fila['img'].'" class="card-img-top" alt="La imagen no ha sido ubicada">';
                $salida .= '<div class="card-body d-flex flex-column">';
                $salida .= '<h5 class="card-title">'.$fila['producto_nombre'].'</h5>';
                $salida .= '<p class="card-text">COP $ '.$fila['precio'].'</p>';
                $salida .= '<p class="card-text">'.$fila['descripcion_producto'].'</p>'; 
                $salida .= '<p class="card-text" id="mostra_fecha" >'.Fecha::mostrarFechas($fila['fec_ver']).'</p>'; 
                $salida .= '</div>';
                $salida .= '</div>';
                $salida .= '</div>';
                
            }
            $salida .= '</div>'; 
            $salida .= '</div>';
        }
        return $salida;
    }
}