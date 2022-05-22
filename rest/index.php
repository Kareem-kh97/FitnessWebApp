<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');

// Core Libraries
require_once '../vendor/autoload.php';
require_once 'config/config.php';
require_once 'utils/Auth.php';
require_once 'dao/BaseDao.php';

// User Libraries
require_once 'dao/UserDao.php';

// Exercise Libraries
require_once 'dao/ExerciseDao.php';
require_once 'service/ExerciseService.php';
require_once 'routes/exercises.php';

Flight::register('exercise_service', 'ExerciseService');
Flight::register('exercise_dao', 'ExerciseDao');
Flight::register('user_dao', 'UserDao');


Flight::route('/', function () {
    echo "hello world!";
});

Flight::route('POST /login', function(){
  $user = Flight::request()->data->getData();
  $db_user = Flight::user_dao()->get_user_by_email($user['user_email']);

  if($db_user){
    if($db_user['password'] == $user['psword']){
      $token_data = [
        'id' => $db_user['id'],
        'email' => $db_user['email'],
        'full_name' => $db_user['full_name'],
        'is_admin' => $db_user['is_admin']
      ];

      $jwt = Auth::encode_jwt($token_data);
      Flight::json(['user_token' => $jwt]);
    } else {
      Flight::halt(404, 'Password is not correct');
    }
  } else {
    Flight::halt(404, 'User not found');
  }
});



Flight::start();
 ?>
