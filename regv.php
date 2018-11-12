<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ("account.php");

$db = new PDO($dsn, $username, $password);

$first = filter_input(INPUT_POST, 'first');
$last = filter_input(INPUT_POST, 'last');
$bday = filter_input(INPUT_POST, 'bday');
$email = filter_input(INPUT_POST, 'email');
$pass = filter_input(INPUT_POST, 'pass');
$errors = array();
$passlength = strlen($pass);
  
if (empty($first)) {
  echo "You forgot to enter your first name<br><br>";
}

  
if (empty($last)) {
  echo "You forgot to enter your last name<br><br>";
}

    
if (empty($bday)) {
  echo "You forgot to enter your first name<br><br>";
}

  
if (empty($email)) {
  echo "You forgot to enter you email address<br><br>";
}
else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "You entered an invalid email address<br><br>";
  }
}
  
if (empty($pass)) {
  echo "You forgot to enter your password<br><br>";
}
else {
  if ($passlength < 8) {
    echo "Password must be at least 8 characters long<br><br>"; 
  }
} 



$query = "INSERT INTO accounts (birthday, email, fname, lname, password) VALUES ('$bday', '$email', '$first', '$last', '$pass')";
$statement = $db->prepare($query);
$statement->execute();
$statement->closeCursor();
session_start();
$_SESSION['email'] = $email; 
header('Location: profile.php');

?>
</body>
</html>