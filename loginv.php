<!DOCTYPE html>
<html>
<body>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ("account.php");

$db = new PDO($dsn, $username, $password);
$email = filter_input(INPUT_POST, 'email');
$pass = filter_input(INPUT_POST, 'password');
$passlength = strlen($pass);
$errors = 0;


if (empty($email)) {
  $errors +=1;
  header('Location: login.php?feedback=You forgot to enter your e-mail');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors +=1;
  header('Location: login.php?feedback=Invalid Email');
}
  
if (empty($pass)) {
  $errors +=1;
  header('Location: login.php?feedback=Missing Password');
}

else {
  if ($passlength < 8) {
    $errors +=1;
    header('Location: login.php?feedback=Password must be at least 8 characters long');
  }
}


$stmt = $db->prepare("SELECT * FROM accounts WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$fetch = $stmt->fetch(PDO::FETCH_ASSOC);
if ($fetch === false) {
  echo "This email has not yet been registered into our system<br><br>";
  echo '<a href="https://web.njit.edu/~ztd2/IS-218-Project-1/reg.php">Click here to register</a><br><br>'; 
  echo 'If you wish to go back to the login page, <a href="https://web.njit.edu/~ztd2/IS-218-Project-1/login.php">Click here</a>';
    $errors +=1;
}
else {
while($row = $fetch) {
  $db_email = $row['email'];
  $db_password = $row['password'];
  break;
}
if ($email==$db_email) {
session_start();
$_SESSION['email'] = $db_email; 
header('Location: profile.php'); 
}
}


?>
</body>
</html>