<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
}
?>
<?php
    $connect = odbc_connect("test",'','') or dir(" Erreur");
    $json = array();
    $sqlQuery = "SELECT * FROM events ORDER BY id";

    $result = odbc_exec($connect, $sqlQuery); 
    $eventArray = array();
    if(is_resource($result) and odbc_num_rows($result)>0){
        while($row = odbc_fetch_array($result)){
        array_push($eventArray, $row);
    }
}
    echo json_encode($eventArray);
?>