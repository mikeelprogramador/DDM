<?php

class Ofertas {

    public static function verOfertas(){
        include_once("../../conf/model_vista.php");
        $salida ="";
        $consulta = ModelVista::sqlverOfertas();
        while($fila = $consulta->fetch_array()){
            $salida .= "<option value='".$fila[1]."'>Oferta</option>";
        }
        return $salida;
    }

    public static function buscarOfertas($idOferta){
        include_once("../../conf/model.php");
        $consulta = Model::sqlBuscarOfertas($idOferta);
        if($consulta->num_rows === 0){
            $salida = "Not exist";
        }else{
            while($fila = $consulta->fetch_array()){
                $salida = $fila[0];
            }
        }
        return $salida;
    }

    public static function contarOfertas($oferta){
        include_once("../../conf/model_vista.php");
        $consulta = ModelVista::sqlContarOfertas($oferta);
        while($fila = $consulta->fetch_array()){
            $salida = $fila[0];
        }
        return $salida;
    }


}