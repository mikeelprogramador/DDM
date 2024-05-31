<?php
class estilo{

    private $menssage;
    private $nowMenssage;

    public function __construct($texto) {
        $this->menssage = $texto;
        estilo::cambio();
    }

    private function cambio(){
       $this-> nowMenssage = password_hash($this->menssage,PASSWORD_DEFAULT);
       $this-> menssage = "";
    }
    public function imprimir(){
        return $this->nowMenssage;
    }
    private function verificar($texto,$base){
        return password_verify($texto,$base);
    }

    public function texto($texto1,$texto2){
        return $this->verificar($texto1,$texto2);
    }
}
// $hola = "mike";
// $miEstilo = new Estilo($hola);
// $guardar = $miEstilo->imprimir();
// $conexion = mysqli_connect("localhost","root","","u");
// //   $sql = "INSERT INTO tb_u(texto) VALUE('$guardar')";
// //   $consulta = $conexion->query($sql); 
// //   if($consulta){
    
// //   }

//   $sql = "select * from tb_u where id =1";
//   $consulta = $conexion->query($sql);
//   while($fila = $consulta->fetch_assoc()){
//       $salida = $fila['texto'];
//       if ($miEstilo->texto($hola,$salida)) {
//           echo "El mensaje es correcto.";
//       } else {
//           echo "El mensaje no es correcto.";
//       }
//   }