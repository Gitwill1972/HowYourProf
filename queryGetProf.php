
<!DOCTYPE>
<html>
</style>
  <head>
  <title>Professor's Page</title>
  <link rel="stylesheet" href="index.css">
  </head>
    <body>
      <h1> How's your Prof  </h1>
      <form action="queryGet.php" method="GET">
      <div class="search_fields">
      Search By: <br>
        <input type="radio" name="search_by" value="prof_name"> Professor
        <input type="radio" name="search_by" value="course_id"> Course <br>
        <input type="text" name="form_name"> <br>
        <input type="submit" name="submit" value="Search">
      </div>
        <input type="button" class = "menu_button" name="reset" value="Reset Filter" onclick="window.location.href='queryGetAll.php'">
      </form>
      <table>
        <tr>
          <th>Rating ID</th>
          <th>Professor</th>
          <th>Course ID</th>
          <th style="width:30%">Rating</th>
          <th>Grading Difficulty</th>
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
              echo "<script>alert('Please enter a Professor's name');</script>";
            }
  					$sql = 'SELECT * FROM ratings WHERE prof_name = :prof_name';

  					$stmt = $pdo->prepare($sql);
  					$stmt->bindParam(":prof_name", $name);
  				} else if ($search_by == 'course_id'){
            if (empty($name)){
              echo "<script>alert('Please enter a course ID in the text box to search');</script>";
            }
          	$sql = 'SELECT * FROM ratings WHERE course_id = :course_id';

  					$stmt = $pdo->prepare($sql);
  					$stmt->bindParam("course_id", $name);
          } 

  			$stmt->execute();

  			$ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($ratings) == 0){
          echo "<script>alert('There are no result matching the search parameter you entered');</script>";
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
            echo '<td>
            <form  class = "hidden" action="queryDelete.php" method="POST" >
              <input type="hidden" name="form_id" value="' . $rating['rating_id'] . '">
              <input type="submit" name="submit" value="Delete">
            </form>
            <form action="updateForm.php" method="GET" >
              <input type="hidden" name="form_id" value="' . $rating['rating_id'] . '">
              <input type="submit" class = "menu_button" name="submit" value="Respond from Professor">
            </form>
            </td>';
            echo 
            '</tr>';
            }
          }
        } else {
          echo "<script>alert('Please select a filter option before searching');</script>";
        }

        $pdo = null;
				?>

      </table>
      <form class = "menu" action="insertForm.php" method="GET" >
        <input type="submit" class = "menu_button" name="submit" value="Create new Rating">
        <input type="button" class = "menu_button" name="home" value="Home" onclick="window.location.href='index.php'">
      </form>

    </body>
</html>
