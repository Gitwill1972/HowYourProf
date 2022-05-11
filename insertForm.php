
<!DOCTYPE>
<html>
  <head>

  </head>
    <body>
      <form action="queryInsert.php" method="POST">
        Who was your professor: <br/>
        <input type="text" name="form_prof_name"> <br/>

        What course did you take: <br/>
        <input type="text" name="form_course_id"> <br/>

        How would you rate this professor overall: <br/>
        <textarea rows = "5" cols = "50" name="form_rating"> Please enter your thoughts</textarea><br/>

        Is this professor a tough grader?: <br/>
        <input type="radio" name="form_difficulty" value="Very"> <label for="Very">Very</label> <br/>
        <input type="radio" name="form_difficulty" value="Average"> <label for="Average">Average</label> <br/>
        <input type="radio" name="form_difficulty" value="Not at all"> <label for="Not At all">Not at all</label> <br/>

        Would you take a course with this professor again?: <br/>
        <input type="radio" name="form_take_again" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_take_again" value="NO"> <label for="NO">No</label> <br/>

        Did you take this course for credit: <br/>
        <input type="radio" name="form_credit" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_credit" value="NO"> <label for="NO">No</label> <br/>

        Did this professor use textbooks?: <br/>
        <input type="radio" name="form_text_book_use" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_text_book_use" value="NO"> <label for="NO">No</label> <br/>

        Was attendance mandatory?:<br/>
        <input type="radio" name="form_attendance" value="YES"> <label for="YES">Yes</label> <br/>
        <input type="radio" name="form_attendance" value="NO"> <label for="NO">No</label> <br/>

        What grade did you received?: <br/>
        <input type="radio" name="form_grade" value="HD"> <label for="HD">High Distinction (80-100)</label> <br/>
        <input type="radio" name="form_grade" value="DI"> <label for="DI">Distinction (70-79)</label> <br/>
        <input type="radio" name="form_grade" value="CR"> <label for="CR">Credit (60-69)</label> <br/>
        <input type="radio" name="form_grade" value="PA"> <label for="PA">Pass (50-59)</label> <br/>
        <input type="radio" name="form_grade" value="NN"> <label for="NN">Fail</label> <br/>
        <input type="radio" name="form_grade" value="WR"> <label for="WR">Withdrawn</label> <br/>
        <input type="radio" name="form_grade" value="N/A"> <label for="N/A">Not Sure Yet</label> <br/>

        <input type="hidden" name="form_prof_Respond" value =""> <br>

        <input type="hidden" name="form_id"> <br/>

        <input type="submit" name="submit" value="Submit Rating">

      </form>

    </body>
</html>
