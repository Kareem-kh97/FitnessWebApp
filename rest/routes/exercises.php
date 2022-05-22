<?php
Flight::route('GET /exercises', function(){
  // $data = apache_request_headers();
  // $user_data = Auth::decode_jwt($data);

  $exercises = Flight::exercise_service()->get_all_exercises();
  Flight::json($exercises);
});


?>
