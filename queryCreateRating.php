<?php

  $pdo = require 'connectDB.php';
  $sql = 'CREATE TABLE IF NOT EXISTS ratings (
    rating_id INT AUTO_INCREMENT,
    prof_name VARCHAR(255) NOT NULL,
    course_id VARCHAR(255) NOT NULL,
    rating TEXT(10000) NOT NULL,
    difficulty TEXT(255) NOT NULL,
    take_again CHAR(3) NOT NULL,
    credit CHAR(3) NOT NULL,
    text_book_use CHAR (3) NOT NUll,
    attendance VARCHAR(60) NOT NULL,
    grade CHAR(3) NOT NULL,
    prof_Respond TEXT(10000),
    PRIMARY KEY (rating_id)
  )';

  $pdo->exec($sql);
  $rating_list = [
            ["prof_name"=>"Graeme Deans",
             "course_id"=>"MGMT1000",
             "rating"=> "He relies on his TA's to mark your work. So it's dependent on your TA basically, and the marking in this course is unnecessarily difficult. He reads off the slides pretty much word for word so the lectures are somewhat useless. Course material itself is not difficult, only the marking. He is the only prof for MGMT1000 so you are stuck with him.",
             "difficulty"=> "Average",
             "take_again"=>"NO", 
             "credit"=>"YES",
             "text_book_use"=>"NO",
             "attendance"=> "Mandatory",
             "grade"=> "CR",
             "prof_Respond"=>"You made a very good point. However, I feel like there are some misconceptions that I would like to correct"],

             ["prof_name"=>"Graeme Deans",
             "course_id"=>"MGMT1000",
             "rating"=> "This course is more about building strong writing and communication skills for business, than actually learning about business. You're marked more on how you communicate and apply course concepts, then your ideas. To succeed, make sure you're as concise as possible while including the most valuable information, if you write a lot, you won't do good",
             "difficulty"=> "Average",
             "take_again"=>"YES", 
             "credit"=>"YES",
             "text_book_use"=>"NO",
             "attendance"=> "Not Mandatory",
             "grade"=> "DI",
             "prof_Respond"=>"I'm glad you understood the core principle of the course"],

             ["prof_name"=>"Graeme Deans",
             "course_id"=>"MGMT1000",
             "rating"=> "Almost the entire course was based on group projects. Engaging lectures with a lot of guest speakers. However, he is a very hard marker and if you simply hand in what you are told to do for the assignment you will do poorly. You're expected to go WAY beyond the assignment expectations, even though he acts like he doesn't want this.",
             "difficulty"=> "Very",
             "take_again"=>"NO", 
             "credit"=>"YES",
             "text_book_use"=>"NO",
             "attendance"=> "Mandatory",
             "grade"=> "DI",
             "prof_Respond"=>""],

             ["prof_name"=>"Michael Valente",
             "course_id"=>"MGMT1000",
             "rating"=> "Mike is a great professor, as he shows that he genuinely cares about his students and wants them to be successful. The concepts being taught in his class are tough to understand but he makes that extra effort to work with you until you do. His instructions on assignments are always clear and he provides excellent feedback in a timely manner.",
             "difficulty"=> "Average",
             "take_again"=>"YES", 
             "credit"=>"YES",
             "text_book_use"=>"NO",
             "attendance"=> "Mandatory",
             "grade"=> "N/A",
             "prof_Respond"=>""],

             ["prof_name"=>"Shakil Khan",
             "course_id"=>"CSE2021",
             "rating"=> "Worst prof I have seen in my life. Does not know how to teach. His labs and tests are completely different from what he teaches. The class average is D. And he thinks that it's a good average. His labs and tests are very very difficult as compared to his teaching. Take the course with him if you want to fail!",
             "difficulty"=> "Very",
             "take_again"=>"NO", 
             "credit"=>"YES",
             "text_book_use"=>"YES",
             "attendance"=> "YES",
             "grade"=> "PA",
             "prof_Respond"=>"I understand your concerns, I will try to rectify this in the future"],

             ["prof_name"=>"Shakil Khan",
             "course_id"=>"CSE2021",
             "rating"=> "Tips for doing well in 2021 with professor Khan. Do the labs by your self. Only seek help if you get stuck for a few days. Use his office hours, He is especially good at explaining things one on one and doesn't mind doing so. The course is 4 credits, so don't take your usual number of courses while taking this, or else you will be overwhelmed.",
             "difficulty"=> "Average",
             "take_again"=>"YES", 
             "credit"=>"YES",
             "text_book_use"=>"YES",
             "attendance"=> "YES",
             "grade"=> "DI",
             "prof_Respond"=>""],


  ];
  $sql = 'INSERT INTO ratings (prof_name, course_id, rating, difficulty, take_again, credit, text_book_use, attendance, grade, prof_Respond)
                      VALUES(:prof_name, :course_id, :rating, :difficulty, :take_again, :credit, :text_book_use, :attendance, :grade, :prof_Respond)';
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
  $stmt->bindParam(":prof_Respond", $prof_Respond);

  for ($i = 0; $i < count($rating_list); $i++){
    echo 'Professor: ', $rating_list[$i]['prof_name'], '<br> Course ID: ',
    $course_id = $rating_list[$i]['course_id'], '<br> Comment: ',
    $rating = $rating_list[$i]['rating'], '<br> Difficult Grader: ',
    $difficulty = $rating_list[$i]['difficulty'], '<br> Would you take another with this professor?: ',
    $take_again = $rating_list[$i]['take_again'], '<br> Was this course taken for credit?: ',
    $credit = $rating_list[$i]['credit'], '<br> Textbook: ',
    $text_book_use = $rating_list[$i]['text_book_use'], '<br> Attendance Required:',
    $attendance = $rating_list[$i]['attendance'], '<br> Grade achieved: ',
    $grade = $rating_list[$i]['grade'], '<br> Respond from professor: ',
    $prof_Respond = $rating_list[$i]['prof_Respond'], '<br> <br> ';

    $prof_name = $rating_list[$i]['prof_name'];
    $course_id = $rating_list[$i]['course_id'];
    $rating = $rating_list[$i]['rating'];
    $difficulty = $rating_list[$i]['difficulty'];
    $take_again = $rating_list[$i]['take_again'];
    $credit = $rating_list[$i]['credit'];
    $text_book_use = $rating_list[$i]['text_book_use'];
    $attendance = $rating_list[$i]['attendance'];
    $grade = $rating_list[$i]['grade'];
    $prof_Respond = $rating_list[$i]['prof_Respond'];
    $stmt->execute();
  }

  $pdo = null;
 ?>
