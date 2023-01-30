<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
}
?>

<?php
$connect = odbc_connect("test",'','') or dir(" Erreur");

$id = isset($_POST['id']) ? $_POST['id'] : "";
echo $id;
$title = isset($_POST['title']) ? $_POST['title'] : "";
$start = isset($_POST['start']) ? $_POST['start'] : "";
$end = isset($_POST['end']) ? $_POST['end'] : "";

$query="update events set title='$title', start_event='$start', end_event='$end' where id='$id'";
$result = odbc_exec($connect, $query); 

?>  