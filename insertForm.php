
<!DOCTYPE>
<html>
  <head>
    <title>Create new Rating</title>
    <h1>Create new Rating</h1>
    <link rel="stylesheet" href="index.css">
  </head>
    <body>
      <form id='insert_form'action="queryInsert.php" method="POST">

        <div class='form_fields'>
        <div class=field_labels>Who was your professor: <br/></div>
        <input type="text" name="form_prof_name"> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>What course did you take: <br/></div>
        <input type="text" name="form_course_id"> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>How would you rate this professor overall: <br/></div>
        <textarea rows = "5" cols = "50" name="form_rating"> Please enter your thoughts</textarea><br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>Is this professor a tough grader?: <br/></div>
        <input type="radio" name="form_difficulty" value="Very"> <label for="Very">Very</label> <br/>
        <input type="radio" name="form_difficulty" value="Average"> <label for="Average">Average</label> <br/>
        <input type="radio" name="form_difficulty" value="Not at all"> <label for="Not At all">Not at all</label> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>Would you take a course with this professor again?: <br/></div>
        <input type="radio" name="form_take_again" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_take_again" value="NO"> <label for="NO">No</label> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>Did you take this course for credit: <br/></div>
        <input type="radio" name="form_credit" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_credit" value="NO"> <label for="NO">No</label> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>Did this professor use textbooks?: <br/></div>
        <input type="radio" name="form_text_book_use" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_text_book_use" value="NO"> <label for="NO">No</label> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>Was attendance mandatory?:<br/></div>
        <input type="radio" name="form_attendance" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_attendance" value="NO"> <label for="NO">No</label> <br/>
        </div>

        <div class='form_fields'>
        <div class=field_labels>What grade did you received?: <br/></div>
        <input type="radio" name="form_grade" value="HD"> <label for="HD">High Distinction (80-100)</label> <br/>
        <input type="radio" name="form_grade" value="DI"> <label for="DI">Distinction (70-79)</label> <br/>
        <input type="radio" name="form_grade" value="CR"> <label for="CR">Credit (60-69)</label> <br/>
        <input type="radio" name="form_grade" value="PA"> <label for="PA">Pass (50-59)</label> <br/>
        <input type="radio" name="form_grade" value="NN"> <label for="NN">Fail</label> <br/>
        <input type="radio" name="form_grade" value="WR"> <label for="WR">Withdrawn</label> <br/>
        <input type="radio" name="form_grade" value="N/A"> <label for="N/A">Not Sure Yet</label> <br/>
        </div>

        <input type="hidden" name="form_prof_Respond" value =""> <br>

        <input type="hidden" name="form_id"> <br/>

        <div class='menu'>
        <input type="submit" class="menu_button" name="submit" value="Submit Rating">
        </div>

      </form>

    </body>
</html>
