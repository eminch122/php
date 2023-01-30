<?php
    
$name=$_POST["name"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$password=$_POST["pwd"];
$tel=$_POST["tel"];

$connexion = odbc_connect("test",'','') or dir(" Erreur");
$query = "INSERT INTO Users (name, last_name, email, password, tel, type) VALUES ('$name','$lastname','$email','$password','$tel','user')";
$result = odbc_exec($connexion, $query); 
        
header("location:../login/login.php")  ;           

?>



                     

	

