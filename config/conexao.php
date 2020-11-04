<?php
/* Connect to a MySQL database using driver invocation */


$host  = "localhost"; //Host de Conexão
$user  = "root"; //Usuário do BD
$pass  = "spx1012"; //Senha do BD
$db    = "asterisk"; //Nome da Database

try {
  $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
} catch (PDOException $e) {
  echo 'Connection failed: ' . $e->getMessage();
}

//-----------------------------------------------------------

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
