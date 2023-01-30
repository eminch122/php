<?php

if (isset($_GET['cat'])&& !empty($_GET['cat'])){

    $connexion = odbc_connect("test",'','') or dir(" Erreur");
    $id=$_GET['cat'];
    $query = "SELECT * from Problems WHERE catId='$id'";
    $result = odbc_exec($connexion, $query); 
    echo" <option selected disabled style='display:none;'>Select a Problem</option>";
    if(is_resource($result) and odbc_num_rows($result)>0){
        while($row = odbc_fetch_array($result)){
        echo"<option value='".$row['probId']."'>".$row['type']."</option> ";

        }}else {
            $connexion = odbc_connect("test",'','') or dir(" Erreur");
            $query = "SELECT * from Problems";
            $result = odbc_exec($connexion, $query); 
            echo" <option selected disabled style='display:none;'>Select a Problem</option>";
            if(is_resource($result) and odbc_num_rows($result)>0){
                while($row = odbc_fetch_array($result)){
                echo"<option value='".$row['probId']."'>".$row['type']."</option> ";
        
                }
        }

}}






?>