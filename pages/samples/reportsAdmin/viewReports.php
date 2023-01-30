<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:error-404.html");
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
                  <h4 class="card-title">Table of all <span class="text-success">users</span> </h4> 
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
                            Tel
                          </th>
                          <th>
                            Password
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $connexion = odbc_connect("test",'','') or dir(" Erreur");
                        $query = "SELECT * from Reports ";
                        $result = odbc_exec($connexion, $query);

                        if(is_resource($result) and odbc_num_rows($result)>0 ){
                            while($row = odbc_fetch_array($result)){
                                $problemQuery = "SELECT type FROM Problems where probId='".$row['probId']."'";
                                $probResult = odbc_exec($connexion, $problemQuery);
                                $prob = '';
                                if(is_resource($probResult) and odbc_num_rows($probResult)>0 ){
                                    while($problem_row = odbc_fetch_array($probResult)){
                                        $prob=$problem_row['type'];
                                    }
                                }
                                $reports[] = array('prob' => $prob,'location' => $row['location'],'description' => $row['description'],
                                'solution' => $row['solution'],'image' => $row['image'],'status' => $row['status'],'id' => $row['rId']
                                );
                            }
                        }
                        
                        foreach ($reports as $report) {
                            
                            if ($report['image']){
                                echo "<tr> <td>".$report['prob'].
                                "</td>"."<td>".$report['location']. 
                                "</td>"."<td>".$report['description'].
                                "</td>"."<td>".$report['solution'].
                                "<td> <a href='http://localhost:8080/project/pages/samples/reports/uploads/".$report['image']."' target='_blank'> <img alt='IMAGE' class='img-fluid' src='../reports/uploads/".$report['image'].
                                "'/></a></td>".
                                "</td>";

                                if ($report['status'] == 'done') {
                                  echo "<td><label class='badge badge-success'>".$report['status']."</label></td>";
                                  echo "<td><input type='submit' value='Done' disabled /></td> ";
                                  
                              } else {
                                  echo "<td><label class='badge badge-danger'>".$report['status']."</label></td>";
                                  echo "<td><form action='update.php' method='GET'> 
                                  <input type='hidden' name='id' value='".$report['id']."'>
                                  <input type='submit'  value='done' onclick='changeStatus(".$report['id'].")'>
                                </form>
                              </td> ";
                              }
                            }
                            else{
                                echo "<tr> <td>".$report['prob'].
                                "</td>"."<td>".$report['location']. 
                                "</td>"."<td>".$report['description'].
                                "</td>"."<td>".$report['solution'].
                                "<td> <img alt='NO-IMG' class='img-fluid' src='../reports/uploads/".$report['image'].
                                "'/></td>".
                                "</td>";

                                if ($report['status'] == 'done') {
                                    echo "<td><label class='badge badge-success'>".$report['status']."</label></td>";
                                    echo "<td><input type='submit' value='Done' disabled /></td> ";
                                    
                                } else {
                                    echo "<td><label class='badge badge-danger'>".$report['status']."</label></td>";
                                    echo "<td><form action='update.php' method='GET'> 
                                    <input type='hidden' name='id' value='".$report['id']."'>
                                    <input type='submit'  value='done' onclick='changeStatus(".$report['id'].")'>
                                  </form>
                                </td> ";
                                }
                                
                               
    
                            }
                            
                      } 
                     
                        ?>
                       <script>
                       function changeStatus(id) {
                          var confirmStatusChange = confirm("Do you want to change the status from Pending to Done?");
                          if (confirmStatusChange == true) {
                            window.location.href = 'update.php?id=' + id;
                          }
                        }
                        
                        </script>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>