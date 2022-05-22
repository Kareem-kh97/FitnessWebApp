<?php
/**
 *
 */
class ExerciseService{

  private $exercise_dao;

  public function __construct(){
    $this->exercise_dao = new ExerciseDao();
  }

  public function get_all_exercises(){
    $exercises = $this->exercise_dao->get_all();

    foreach ($exercises as $idx => $exercise) {
      $exercises[$idx]['delete_exercise'] = '<a onclick="delete_exercise('.$exercise['id'].')"> Delete </a>';
    }

    return $exercises;
  }
}



 ?>
