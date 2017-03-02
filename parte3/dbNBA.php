<?php
/**
 * Permitir la conexion contra la base de datos
 */

class dbNBA
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="nba";

  //Conector
  private $conexion;

  //Propiedades para controlar errores
  private $error=false;

  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }

  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  //Funciones para la devolucion de resultados
  public function devolverEquipos($local,$visitante,$temporada){
    $resultado="";
    if($this->error==false){

      // Si local tiene datos
      if (!empty($local)) {
        $resultado= " WHERE equipo_local='".$local."'";
      }

    // Si visitante tiene datos
    if (!empty($visitante)) {

      // Y si local tiene datos
      if (!empty($local)) {
        $resultado= $resultado." AND equipo_visitante='".$visitante."'";

    // Si solo visitante tiene datos
    }else{
        $resultado = " WHERE equipo_visitante='".$visitante."'";
    }
    }

  // Si temporada tiene datos
  if (!empty($temporada)) {

    // Si local y visitante tiene datos
    if ((!empty($local)) || (!empty($visitante))){
      $resultado=$resultado." AND temporada='".$temporada."'";

    // Si solo tiene datos temporada
    }else{
      $resultado =" WHERE temporada='".$temporada."'";}
    }


  return $this->conexion->query("SELECT equipo_local,puntos_local,equipo_visitante,puntos_visitante,temporada FROM partidos ".$resultado);

}else{
  return null;
}

}

}
 ?>
