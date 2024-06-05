<?php
include("../metodos/bd-conect/inclucion-bd.php");
$sql = "select img from tb_productos";
$consulta = $conexion->query($sql);
while($fila = $consulta->fetch_assoc()){
  echo '<img src="'.$fila['img'].'">';
  echo $fila['img'];
}
?>