<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
}
?>
<?php

echo $id = $_GET['id'];

$status="done";
$connexion = odbc_connect("test",'','') or dir(" Erreur");
$query="update Reports set status='$status' where rId=$id";
            $result = odbc_exec($connexion, $query); 
            if($result){
                header("location:viewReports.php");
            }else{
                echo'sorry';
            }

?>
<!-- 
 -->