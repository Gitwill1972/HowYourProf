
<!DOCTYPE>
<html>
  <head>

  </head>
    <body>
      <form action="queryUpdate.php" method="POST">

        <?php
        $rating_id = $_GET["form_id"];

        $pdo = require_once 'connectDB.php';
        $sql = 'SELECT * FROM ratings
                WHERE rating_id = :rating_id';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':rating_id', $rating_id, PDO::PARAM_INT);
        $stmt->execute();
        $rating = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rating) {
          echo 'What are your thoughts as the lecturer?: <br> <textarea rows = "5" cols = "50" name="form_prof_Respond"> Please enter your respond</textarea><br/>';
          echo '<input type="hidden" name="form_id" value="' . $rating['rating_id'] . '"> <br/>';
        } else {
        	echo "The rating with id $rating_id was not found.";
        }

        $pdo = null;
        ?>

          <input type="submit" name="submit" value="Confirm Respond">
      </form>

    </body>
</html>
