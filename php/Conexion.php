<?php 
 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'ejemplo';
   private $usuario = 'ejemplo';
   private $contrasena = 'ejemplo'; 
   public function __construct() {

      //Sobreescribo el método constructor de la clase PDO.
      try{
                   //prueba linea no requerida para la conexion.
     
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
  
   } 
   
 }



