<?php
 include './service/conexion.php';

 function insert($NOMBRE, $URL_PRINCIPAL, $DESCRIPCION){
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO seg_funcionalidad (NOMBRE, URL_PRINCIPAL, DESCRIPCION) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $NOMBRE, $URL_PRINCIPAL, $DESCRIPCION);
    $stmt->execute();
    $stmt->close();
 }
  function findAll(){
      $conn = getConnection();
      return $conn->query("SELECT * from seg_funcionalidad");
  }
  function findByPK($COD_MODULO){
    $conn = getConnection();
    $result = $conn->query("SELECT * FROM seg_funcionalidad WHERE COD_MODULO= '$COD_MODULO'" );
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }else{
        return null;
    }
   }

  function update($COD_MODULO, $NOMBRE, $ESTADO){
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE seg_modulo set COD_MODULO= ?, NOMBRE=?, ESTADO=? where COD_MODULO='$COD_MODULO'");
    $stmt->bind_param("sss",$COD_MODULO , $NOMBRE, $ESTADO);
    $stmt->execute();
    $stmt->close();
  }
  function delete($COD_MODULO){
    $conn = getConnection();
    $stmt = $conn->prepare("DELETE FROM seg_modulo WHERE COD_MODULO= '$COD_MODULO'" );
    $stmt->execute();
    $stmt->close();

  }
 ?>