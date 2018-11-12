<?php
echo "<h1>PDO Check!</h1>";
$username = 'ztd2';
$password = 'aYF90o8tY';
$hostname = 'sql1.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>