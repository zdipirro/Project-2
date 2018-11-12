<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
$username = 'ztd2';
$password = 'aYF90o8tY';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";

$db = new PDO($dsn, $username, $password);
?>
<!DOCTYPE html>
<html>

   <head>
      <title>Profile Page</title>
      <link type="text/css" rel="stylesheet" href="profile.css" />
   </head>
	
   <body>
   <center>
   <?php
     session_start();
     if(isset($_SESSION['email'])) {
       $query = "SELECT id, email, fname, lname FROM accounts WHERE email = :email";
       $stmt = $db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $session_email = $_SESSION['email'];
       $stmt->execute(array(':email' => $session_email));
   ?> 
   <div id = "container">
   <?php
     if($stmt->rowCount()) {
         while($row = $stmt->fetch()) {
           $id = $row['id'];
           $user_email = $row['email'];
           $first = $row['fname'];
           $last = $row['lname'];
         }
       }
       else {
         echo "The username doesn't exist. Maybe the session was modified";
       }
     }
     else {
       echo "Session username was not set";
     }
      
   ?>
   <div id = "menu">
   <a href="logout.php">Logout</a>
   </div>
   <div id = "profile">
     <?php echo $first." ".$last."'s Profile"; ?>
   </div> 
   <div class = "questions">
     Recently Asked Quesitons <br />
     <?php
     if($session_email == $_SESSION['email']) {
       $queryq = "SELECT ownerid, title, body, skills FROM questions WHERE owneremail =:email";
       $stmtq = $db->prepare($queryq, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
       $qemail = $_SESSION['email'];
       $stmtq->execute(array(':email' => $qemail));
     if($stmtq->rowCount()) {
       while($r = $stmtq->fetch()) {
         $title = $r['title'];
         $body = $r['body'];
         $skills = $r['skills'];
       }
     }
     else {
       $title = "N/A";
       $body = "N/A";
       $skills = "N/A";
     }
     }
     else {
       echo "Session username was not set";
     }
    ?>
   <div class = "title">
     <?php echo "Title: ".$title."<br><br>Body: ".$body."<br><br>Skills: ".$skills; ?>
   </div>
   <div class = "ask">
   <span><a href="https://web.njit.edu/~ztd2/IS-218-Project-1/ques.php">Click here to ask a quesiton</a><br><br></span>
   </div>
   </div>
   </div>
   </center>
   </body>
 
	
</html>
