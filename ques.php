<!DOCTYPE html>
<html>

   <head>
      <title>Question Form</title>
      <link rel = "stylesheet" href = "ques.css">
   </head>
	
   <body>
   <form method = "post" action = "quesv.php">
   <div class = "quesbox" align = "center">
     <h1>Question Form</h1>
     <p>Please fill out the Question Form</p>
     
     <hr>
     <p>Question Name</p>
     <input type = "text" name = "qname" placeholder = "Enter Question Name" required>
     <p>Question Body</p>
     <textarea name = "qbody" rows = "4" cols = "40" placeholder = "Enter Question Body" required></textarea>
     <p>Question Skills</p>
     <textarea name = "qskills" rows = "4" cols = "40" placeholder = "Enter Question Skills; Separate each skill by comma" required></textarea>
     <hr>
     
     <button type = "submit" name = "button" class = "submit">Submit Question</button>
      
   </div>
   
   </form>
   </body>
  
</html>

