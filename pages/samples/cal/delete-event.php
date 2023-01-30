<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
}
?>

<?php
$connect = odbc_connect("test",'','') or dir(" Erreur");
$id = isset($_POST['id']) ? $_POST['id'] : "";

$sqlDelete = "DELETE FROM events WHERE id='$id'";

$result = odbc_exec($connect, $sqlDelete);

?>