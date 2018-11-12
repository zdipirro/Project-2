<!DOCTYPE html>
<html>

   <head>
      <title>Registration Form</title>
      <link rel="stylesheet" href="reg.css">
   </head>
	
   <body>
   <div class="regbox">
   <form method="post" action="regv.php">
   <?php 
     if(!isset($_SESSION['email'])) { 
   ?>
     <h1>Registration Form</h1>
     <p>Please fill in this form to create an account.</p>
     <hr>
     <p>First Name</p>
     <input type = "text" name = "first" placeholder = "Enter First Name" required>
     <p>Last Name</p>
     <input type = "text" name = "last" placeholder = "Enter Last Name" required>
     <p>Birthday</p>
     <input type = "date" name = "bday" placeholder = "Enter Birthday" required>
     <p>Email Address</p>
     <input type = "text" name = "email" placeholder = "Enter Email Address" required>
     <p>Password</p>
     <input type = "password" name = "pass" placeholder = "Enter Password" required>
     <hr>
     
     <button type = "submit" name = "button" class = "registerbtn">Register</button>
      
   </form>
   <?php
     if(isset($_GET["feedback"]))
       echo $_GET["feedback"];
     }
   ?>
   </div>
   </body>
  
</html>

  