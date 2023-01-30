<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:../error-404.html");
}
?>
<?php

        $connexion = odbc_connect("test",'','') or dir(" Erreur");
        if($_GET['id']) {
            $id = $_GET['id'];
            $query = "DELETE FROM Users WHERE userId='$id'";
            $result = odbc_exec($connexion, $query); 
            if($result){
                header("location:manageUsers.php");
            }else{
                echo'sorry';
            }

        }

?>