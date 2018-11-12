<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include ("account.php");

$db = new PDO($dsn, $username, $password);
$errors = 0;
$qname = filter_input(INPUT_POST, 'qname');
$qbody = filter_input(INPUT_POST, 'qbody');
$qskills = filter_input(INPUT_POST, 'qskills');
$array = array($qskills);
$skills = implode(', ', $array);
$qnlength = strlen($qname);
$qblength = strlen($qbody);
$qslength = count($skills);

if (empty($qname)) {
  echo "You forgot to enter the name of your question<br><br>";
  $errors +=1;
}
else {
  if ($qnlength < 3) {
    echo "Question name must be at least 3 characters long<br><br>";
    $errors +=1;
  }
}

if (empty($qbody)) {
  echo "You forgot to enter information into the question body<br><br>";
  $errors +=1;
}
else {
  if ($qblength > 500) {
    echo "Question body has a maximum length of 500 characters<br><br>"; 
    $errors +=1;
  }
}

  session_start();
  $email = $_SESSION['email']; 
  $query = "INSERT INTO questions (title, body, skills, owneremail) VALUES ('$qname', '$qbody', '$skills', '$email')";
  $statement = $db->prepare($query);
  $statement->execute();
  $statement->closeCursor();
  header('Location: profile.php');

?> 