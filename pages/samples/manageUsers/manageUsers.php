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
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Manage <span class="text-success">users</span> </h4> 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User ID
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Last name
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            password
                          </th>
                          <th>
                            Update
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         
                         $connexion = odbc_connect("test",'','') or dir(" Erreur");
                         $query = "SELECT * from Users";
                         $result = odbc_exec($connexion, $query); 
                        
                        if(is_resource($result) and odbc_num_rows($result)>0){
                            while($row = odbc_fetch_array($result)){
                                echo "<tr> <td>".$row['userId'].
                                "</td>"."<td>".$row['name'].
                                "</td>"."<td>".$row['last_name'].
                                "</td>"."<td>".$row['email'].
                                "</td>"."<td>".$row['password'].
                                "</td>".
                                '<td><a class="text-success" href="update.php?updateid='.$row['userId'].'">Update</a> </td>
                                <td><a class="text-danger" href="delete.php?id='.$row['userId'].'">Delete</a> </td>'.
                                "</td> 
                                </tr>";
                                }   
                            }
                        

                            
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
        <?php
               


?>