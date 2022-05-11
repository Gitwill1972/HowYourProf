<?php

$pdo = require_once 'connectDB.php';
$sql = 'INSERT INTO ratings (prof_name, course_id, rating, difficulty, take_again, credit, text_book_use, attendance, grade)
                    VALUES(:prof_name, :course_id, :rating, :difficulty, :take_again, :credit, :text_book_use, :attendance, :grade)';
$stmt = $pdo->prepare($sql);

$stmt->bindParam(":prof_name", $prof_name);
$stmt->bindParam(":course_id", $course_id);
$stmt->bindParam(":rating", $rating);
$stmt->bindParam(":difficulty", $difficulty);
$stmt->bindParam(":take_again", $take_again);
$stmt->bindParam(":credit", $credit);
$stmt->bindParam(":text_book_use", $text_book_use);
$stmt->bindParam(":attendance", $attendance);
$stmt->bindParam(":grade", $grade);

$prof_name = $_POST['form_prof_name'];
$course_id = $_POST['form_course_id'];
$rating = $_POST['form_rating'];
$difficulty = $_POST['form_difficulty'];
$take_again = $_POST['form_take_again'];
$credit = $_POST['form_credit'];
$text_book_use = $_POST['form_text_book_use'];
$attendance = $_POST['form_attendance'];
$grade = $_POST['form_grade'];
if (empty($prof_name)){
  echo 'Please enter the name of your professor', '<br>';
}
if (empty($course_id)){
  echo 'Please enter the ID of the course you took', '<br>';
}
if (empty($rating)){
  echo 'How would you rate this professor', '<br>';
}
if (empty($difficulty)){
  echo 'How difficult was this professor', '<br>';
}
if (empty($take_again)){
  echo 'Would you take this professor again', '<br>';
}
if (empty($credit)){
  echo 'Was this course taken for credit', '<br>';
}
if (empty($text_book_use)){
  echo 'Did this professor use textbook', '<br>';
}
if (empty($attendance)){
  echo 'Was attendance mandatory ?';
}
if (empty($grade)){
  echo 'What grade did you received ?';
}

if ( !(empty($prof_name) || empty($course_id) || empty($rating) || empty($difficulty) || empty($take_again) || empty($credit) || empty($text_book_use) || empty($attendance) || empty($grade)) ){
  if($stmt->execute()){
    echo 'Your rating had been submitted!';
  }

}


echo '<br>';
$pdo = null;
?>
<input type="button" name="return" value="Return to Homepage" onclick="window.location.href='queryGetAll.php'">
