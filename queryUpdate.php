<?php
// connect to the bookdb database

$pdo = require 'connectDB.php';

$sql = 'UPDATE ratings
        SET prof_Respond = :prof_Respond
        WHERE rating_id = :rating_id';

// prepare statement
$stmt = $pdo->prepare($sql);

// bind params
$stmt->bindParam(":rating_id", $rating_id, PDO::PARAM_INT);
$stmt->bindParam(":prof_Respond", $prof_Respond, );

$rating_id = $_POST['form_id'];
$prof_Respond = $_POST['form_prof_Respond'];

// execute the UPDATE statment
if ($stmt->execute()) {
	echo 'Your respond as a professor has been successfully updated!';
}
echo '<br>';
$pdo = null;
?>
<input type="button" name="return" value="Return to Homepage" onclick="window.location.href='queryGetAll.php'">
