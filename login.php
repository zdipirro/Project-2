
<!DOCTYPE html>
<html>

   <head>
      <title>Login Form</title>
      <link rel="stylesheet" href="login.css">
   </head>
	
   <body>
   <div class = "logbutton">
     <form method="post" action="loginv.php">
     <center>
     <?php 
       if(!isset($_SESSION['email'])) { 
     ?>
       <h1>Login Form</h1>
           <hr>
           <p>Email Address: </p>
           <input type = "text" name = "email" placeholder = "Enter Email Address"/>
           <br>
           <p>Password: </p>
           <input type = "password" name = "password" placeholder = "Enter Password"/>
           <br>
           <hr>
           <button type = "submit" name = 'submit' class = "logbutton">Login</button>
           <br><br><a href="https://web.njit.edu/~ztd2/IS-218-Project-1/reg.php">Click here to register</a><br><br>
     </form>
     <?php
       if(isset($_GET["feedback"]))
         echo $_GET["feedback"];
     }
     ?>
   </center>
   </div>
   </body>
 
	
</html>