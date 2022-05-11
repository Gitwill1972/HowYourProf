<?php
$rating_id = $_POST["form_id"];
//$publisher_id = 1;
// connect to the database and select the publisher
$pdo = require 'connectDB.php';

// construct the delete statement
$sql = 'DELETE FROM ratings
        WHERE rating_id = :rating_id';

// prepare the statement for execution
$statement = $pdo->prepare($sql);
$statement->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);

// execute the statement
if ($statement->execute()) {
	echo 'rating id ' . $rating_id . ' was deleted successfully.';
}
echo '<br>';
$pdo = null;
?>
<input type="button" name="return" value="Return to Rating list" onclick="window.location.href='queryGetAllAdmin.php'">
