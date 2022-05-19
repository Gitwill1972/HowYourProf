<!DOCTYPE>
<html>
  <head>
    <title>Admin's Page</title>
  <link rel="stylesheet" href="index.css">
  </head>
    <body>
      <h1> How's your Prof </h1>
      <form action="queryGetAdmin.php" method="GET">
      <div class="search_fields">
      Search By: <br>
        <input type="radio" name="search_by" value="prof_name"> Professor
        <input type="radio" name="search_by" value="course_id"> Course <br>
        <input type="text" name="form_name"> <br>
        </div>
        <input type="button" class = "menu_button" name="reset" value="Reset Filter" onclick="window.location.href='queryGetAllAdmin.php'">
      

      </form>
      <table>
        <tr>
          <th>Rating ID</th>
          <th>Professor</th>
          <th>Course ID</th>
          <th style="width:30%">Rating</th>
          <th>Grade Difficulty</th>
          <th>Take again</th>
          <th>Credit</th>
          <th>Textbook</th>
          <th>Attendance Required</th>
          <th>Grade</th>
          <th style="width:30%">Respond from Professor</th>
        </tr>

        <?php
        $pdo = require 'connectDB.php';
        $sql = 'SELECT * FROM ratings';

        $stmt = $pdo->query($sql);
        $ratings = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
            <form action="queryDelete.php" method="POST" >
              <input type="hidden" name="form_id" value="' . $rating['rating_id'] . '">
              <input type="submit" class="menu_button" name="submit" value="Delete">
            </form>
            <form  class = "hidden" action="updateForm.php" method="GET" >
              <input type="hidden" name="form_id" value="' . $rating['rating_id'] . '">
              <input type="submit" class="menu_button" name="submit" value="Respond from Professor">
            </form>
            </td></div>';
            echo '</tr>';
          }
        }
        $pdo = null;
        ?>

      </table>
      <form class="menu" action="insertForm.php" method="GET" >
        <input type="submit" class = "menu_button" name="submit" value="Create new Rating">
        <input type="button" class = "menu_button" name="home" value="Home" onclick="window.location.href='index.php'">
      </form>

    </body>
</html>
