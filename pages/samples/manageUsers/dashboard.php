<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:../error-404.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Commune</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
  
</head>
<body class="bg-transparent">
  
<?php 
 $connexion = odbc_connect("test",'','') or dir(" Erreur");
 $query = "SELECT * from Users";
 $resultUsers = odbc_exec($connexion, $query); 
 $users=odbc_num_rows($resultUsers);


 $queryRep = "SELECT * from Reports";
 $resultRep = odbc_exec($connexion, $queryRep); 
 $reports=odbc_num_rows($resultRep);

 $queryev = "SELECT * from events";
 $resultev = odbc_exec($connexion, $queryev); 
 $events=odbc_num_rows($resultev);



?>
            <!-- all users -->
          <div id="div">
         
<div class="row">
            
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Users</p>
                      <p class="fs-30 mb-2"><?php echo $users ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Reports</p>
                      <p class="fs-30 mb-2"><?php echo $reports ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                    <p class="mb-4">Number of Events</p>
                      <p class="fs-30 mb-2"><?php echo $events ?></p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          </div>
        </body>
</html>