<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
}
?>

<?php
$connect = odbc_connect("test",'','') or dir(" Erreur");

$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$sqlInsert = "INSERT INTO events (title, start_event, end_event) VALUES ('$title','$start','$end')";

$result = odbc_exec($connect, $sqlInsert); 


?>