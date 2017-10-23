<?php namespace Models;

  class Connection {
    private $data = array (
      "host" => "localhost",
      "user" => "root",
      "pass" => "olade56",
      "db" => "inventariodb"
    );
    private $con;
    private $id;

    public function __construct() {
      $this->con = new \mysqli($this->data['host'], $this->data['user'], $this->data['pass'], $this->data['db']);
      if($this->con->connect_errno) {
          echo '<h1 style="color: red">Error al conectar con la base de datos</h1>';
          exit();
      }
    }

    public function simpleQuery($sql) {
      if(empty($sql) || is_null($sql))
        print "Sentencia SQL vacia. simpleQuery";
      $this->con->query($sql);
      $this->id = $this->con->insert_id;
    }

    public function returnQuery($sql) {
      if(empty($sql) || is_null($sql)) {
        print "Sentencia SQL vacia. returnQuery";
      } else
        return $this->con->query($sql);
    }

    public function getID() {
      return $this->id;
    }
  }
 ?>
