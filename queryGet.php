
<!DOCTYPE>
<html>
<style>
table, th, td {
  border:1px solid black;
}
td{
    text-align: center;
}
</style>
  <head>
  </head>
    <body>
      <h1> How's your Prof  </h1>
      <form action="queryGet.php" method="GET">
      Search By: <br>
        <input type="radio" name="search_by" value="prof_name"> Professor
        <input type="radio" name="search_by" value="course_id"> Course <br>
        <input type="text" name="form_name"> <br>
        <input type="submit" name="submit" value="Search">
        <input type="button" name="reset" value="Reset Filter" onclick="window.location.href='queryGetAll.php'">
      </form>
      <table>
        <tr>
          <th>Rating ID</th>
          <th>Professor</th>
          <th>Course ID</th>
          <th style="width:30%">Rating</th>
          <th>Difficulty</th>
          <th>Take again</th>
          <th>Credit</th>
          <th>Textbook</th>
          <th>Attendance Required</th>
          <th>Grade</th>
          <th style="width:30%">Respond from Professor</th>
        </tr>
				<?php
        if ( isset($_GET['search_by']) ){
          $search_by = $_GET['search_by'];
          $name = ($_GET['form_name']);
          
  				$pdo = require "connectDB.php";

  				if ($search_by == 'prof_name'){
            if (empty($name)){
              echo "Please enter a Professor's name";
            }
  					$sql = 'SELECT * FROM ratings WHERE prof_name = :prof_name';

  					$stmt = $pdo->prepare($sql);
  					$stmt->bindParam(":prof_name", $name);
  				} else if ($search_by == 'course_id'){
            if (empty($name)){
              echo 'please enter a course_id name in the text box to search';
            }
          	$sql = 'SELECT * FROM ratings WHERE course_id = :course_id';

  					$stmt = $pdo->prepare($sql);
  					$stmt->bindParam("course_id", $name);
          } 

  			$stmt->execute();

  			$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($ratings) == 0){
          echo 'there are no result matching the search parameter you entered';
        }
  			if ($ratings) {
          foreach ($ratings as $rating) {
            echo 
            '<tr>
            <td>' . $rating['rating_id'] . '</td>',
            '<td>' . $rating['prof_name'] . '</td>', 
            '<td>' . $rating['course_id'] . '</td>',
            '<td>' . $rating['rating'] . ' </td>',
            '<td>' . $rating['difficulty'] . '</td>', 
            '<td>' . $rating['take_again'] . '</td>', 
            '<td>' . $rating['credit'] . '</td>',
            '<td>' . $rating['text_book_use'] . '</td>',  
            '<td>' . $rating['attendance'] . '</td>', 
            '<td>' . $rating['grade'] . '</td>',
            '<td>' . $rating['prof_Respond'] . '</td>';
            '</tr>';
            }
          }
        } else {
          echo 'please select a filter option before searching';
        }

        $pdo = null;
				?>

      </table>
      <form action="insertForm.php" method="GET" >
        <input type="submit" name="submit" value="Create new Rating">
        <input type="button" name="home" value="Home" onclick="window.location.href='index.php'">
      </form>

    </body>
</html>
