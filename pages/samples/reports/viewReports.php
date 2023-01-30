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
  <link rel="stylesheet" type="text/css" href="../../../js/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="perso.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="row">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reports and status</h4>
                  <p class="card-description">
                    Status will change to done once it's finnished
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User</th>
                          <th>Problem</th>
                          <th>Location</th>
                          <th>Description</th>
                          <th>Solution</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      session_start();
                        $userid=$_SESSION["userId"];
                        $connexion = odbc_connect("test",'','') or die(" Erreur");


                        $reports = array();
                        $name = '';

                        $userName = "SELECT name from Users where userId=$userid";
                        $nameResult = odbc_exec($connexion, $userName); 
                        if(is_resource($nameResult) and odbc_num_rows($nameResult)>0 ){
                            while($row = odbc_fetch_array($nameResult)){
                                $name=$row['name'];
                            }
                        }

                        
                        $query = "SELECT * from Reports where userId=$userid";
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
                                $reports[] = array('name' => $name,'prob' => $prob,'location' => $row['location'],
                                'description' => $row['description'],'solution' => $row['solution'],'status' => $row['status']
                                );
                            }
                        }
                        
                        foreach ($reports as $report) {
                            echo "<tr> <td>".$report['name'].
                            "</td>"."<td>".$report['prob'].
                            "</td>"."<td>".$report['location'].
                            "</td>"."<td>".$report['description'].
                            "</td>"."<td>".$report['solution'].
                            "</td>";

                            if ($report['status'] == 'done') {
                              echo "<td><label class='badge badge-success'>".$report['status']."</label></td>";         
                          } else {
                              echo "<td><label class='badge badge-danger'>".$report['status']."</label></td>";
                          }
                        }
                                ?>
                        
                            
                        </tr>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
</body>
</html>