<?php namespace Models;

  class Group {
    private $id;
    private $grade;
    private $section;
    private $capacity;
    private $num_classroom;
    private $turn;
    private $id_student;
    private $enrollment;
    private $id_student_list;
    private $con;

    public function __construct() {
      $this->con = new Connection();
    }

    public function add() {
      $sql = "INSERT INTO groups (ID_group, grade, section, capacity, num_classroom, turn)
              VALUES (null, '{$this->grade}', '{$this->section}', '{$this->capacity}', '{$this->num_classroom}', '{$this->turn}')";
      $this->con->simpleQuery($sql);
    }

    public function addStudent() {
      if(is_null($this->enrollment))
        $student = $this->id_student;
      else {
        $st = mysqli_fetch_array($this->con->returnQuery("SELECT ID_student FROM students WHERE enrollment = '{$this->enrollment}' LIMIT 1"));
        $student = $st['ID_student'];
      }
      $sql = "INSERT INTO students_list (ID_student_list, ID_student, ID_group) VALUES (null, '{$student}', '{$this->id}')";
      $this->con->simpleQuery($sql);
    }

    public function delete() {
      $sql = "DELETE FROM groups WHERE ID_group = '{$this->id}'";
      $this->con->simpleQuery($sql);
    }

    public function deleteStudent() {
      $sql = "DELETE FROM students_list WHERE ID_student_list = '{$this->id_student_list}'";
      $this->con->simpleQuery($sql);
    }

    public function edit() {
      $sql = "UPDATE groups SET grade = '{$this->grade}',
                                section = '{$this->section}',
                                capacity = '{$this->capacity}',
                                num_classroom = '{$this->num_classroom}',
                                turn = '{$this->turn}'
            WHERE ID_group = '{$this->id}'";
      $this->con->simpleQuery($sql);
    }

    public function toList() {
      return $this->con->returnQuery("SELECT * FROM groups");
    }

    public function set($attribute, $content) {
      if($attribute == "turn") {
        if($content == "morning" || $content == "evening")
          $this->turn = $content;
        else
          print "Error al asignar al atributo 'turn'.";
      } else {
        $this->$attribute = $content;
      }
    }

    public function get($attribute) {
      return $this->$attribute;
    }

    public function view() {
      $sql = "SELECT * FROM groups WHERE ID_group = '{$this->id}'";
      $data = $this->con->returnQuery($sql);
      return array("group" => mysqli_fetch_array($data), "students" => $this->viewStudents());
    }

    public function viewStudents() {
      $sql = "SELECT t1.*, t2.* FROM students_list t1 INNER JOIN students t2 ON t1.ID_student = t2.ID_student WHERE t1.ID_group = '{$this->id}'";
      $data = $this->con->returnQuery($sql);
      return $data;
    }

    public function viewStudent() {
      $sql = $this->con->returnQuery("SELECT * FROM students_list WHERE ID_student_list = '{$this->id_student_list}'");
      $data = mysqli_fetch_array($sql);
      $sql2 = $this->con->returnQuery("SELECT * FROM groups INNER JOIN students ON ID_student = '{$data['ID_student']}' WHERE ID_group = '{$data['ID_group']}'");
      return mysqli_fetch_array($sql2);
    }
  }
 ?>
