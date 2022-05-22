<?php
class ExerciseDao extends BaseDao{

  public $table = 'exercises';

  public function __construct(){
    parent::__construct($this->table);
  }

  public function update_exercise($exercise, $exercise_id){
    $entity[':id'] = $exercise_id;
    $query= 'UPDATE '.  $this->table . ' SET ';
    foreach ($exercise as $key => $value) {
      $query .= $key . '=:' . $key . ', ';
      $entity[':' . $key] = $value;
    }
    $query = rtrim($query,', ') . ' WHERE id=:id';
    return $this->update($entity, $query);
  }

  public function delete_exercise($exercise_id){
    $entity[':id'] = $exercise_id;
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
    return $this->execute($entity, $query);
  }

}

 ?>
