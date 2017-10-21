<?php namespace Controllers;

  use Models\Group as Group;
  use Models\Student as Student;

  class groupsController {
    private $group;
    private $student;

    public function __construct() {
      $this->group = new Group();
      $this->student = new Student();
    }

    public function index() {
      return $this->group->toList();
    }

    public function view($id) {
      $this->group->set("id", $id);
      return $this->group->view();
    }

    public function add() {
      if($_POST) {
        $this->group->set("grade", $_POST['grade']);
        $this->group->set("section", $_POST['section']);
        $this->group->set("capacity", $_POST['capacity']);
        $this->group->set("num_classroom", $_POST['num_classroom']);
        $this->group->set("turn", $_POST['turn']);
        $this->group->add();
        echo '<div class="alert alert-dismissible alert-success psmall">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Hecho!</strong> Haz agregado un nuevo grupo.
              </div>';

      }
    }

    public function edit($id) {
      $this->group->set("id", $id);
      if($_POST) {
        $this->group->set("grade", $_POST['grade']);
        $this->group->set("section", $_POST['section']);
        $this->group->set("capacity", $_POST['capacity']);
        $this->group->set("num_classroom", $_POST['num_classroom']);
        $this->group->set("turn", $_POST['turn']);
        $this->group->edit();

        echo '<div class="alert alert-dismissible alert-success psmall">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>¡Hecho!</strong> Haz editado el grupo.
              </div>';
      }
      $data = $this->group->view();
      return $data['group'];
    }

    public function addstudents($id) {
    $this->group->set("id", $id);
      if($_POST)
      {
          if(isset($_POST['enrollment'])) {
            $this->group->set("enrollment", $_POST['enrollment']);
          } else {
            $this->group->set("id_student", $_POST['student']);
          }
          $this->group->addStudent();
      }
      $data = $this->group->view();
      return array("students" => $this->student->toList2(), "group" => $data['group']);
    }

    public function deletestudent($id) {
      $this->group->set("id_student_list", $id);
      if($_POST) {
        $this->group->deleteStudent(); ?>
        <script type="text/javascript">
        this.location.href = '<?php echo URL."groups/view/".$_POST['g']; ?>';
        </script>
      <?php } else {
        return $this->group->viewStudent();
      }
    }

    public function delete($id) {
      $this->group->set("id", $id);
      if($_POST) {
        $this->group->delete(); ?>
        <script type="text/javascript">
        this.location.href = '<?php echo URL; ?>groups';
        </script>
      <?php
      } else {
        $data = $this->group->view();
        return $data['group'];
      }
    }
  }
?>
