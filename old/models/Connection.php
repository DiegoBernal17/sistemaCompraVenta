<?php namespace models;

  class Connection {

    private $data = array (
      "host" => "localhost",
      "user" => "root",
      "pass" => "olade56",
      "db" => "inventariodb"
    );
    private $con;

    public function __construct() {
      $this->con = new \mysqli(
        $this->data['host'],
        $this->data['user'],
        $this->data['pass'],
        $this->data['db']);
    }

    public function simpleQuery($sql) {
      if(empty($sql) || is_null($sql))
        print "Sentencia SQL vacia. simpleQuery";
      $this->con->query($sql);
    }

    public function returnQuery($sql) {
      if(empty($sql) || is_null($sql)) {
        print "Sentencia SQL vacia. returnQuery";
      } else
        return $this->con->query($sql);
    }
  }
 ?>