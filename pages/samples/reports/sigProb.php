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
  <link rel="stylesheet" type="text/css" href="../../../js/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="perso.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../images/favicon.png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body class="bg-transparent">
    <script>
      $(document).ready(function(){
      $('#cat').on('change',function(){
        var catId = $(this).val();
        if (catId){
          $.get(
            "ProblemCategory.php",
            {cat:catId},
            function(data){
              $('#ProblemCategory').html(data);
            }
          );
        }else{
          $('#ProblemCategory').html('<option selected>select a cat</option>')
        }


      });


});
    </script>

<div class="row d-flex justify-content-center bg-transparent">
            <div class="col-md-6 grid-margin stretch-card ">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Report a problem</h4>
                  <p class="card-description">
                    you will send this to admin so be precise 
                  </p>
                  <form class="forms-sample "  method="POST">
                    <div class="form-group">
                      <div class="row ">
                      <label for="ProblemType" class="col-4 my-auto" style="color: #4b49ac;">Problem Type</label> <br>
                        <select name="category" id="cat" class="form-select form-select-lg mb-3 col-6 my-auto" aria-label=".form-select-lg example" >
                        <option selected disabled style="display:none;">Select a Type</option>
                        <option value="all">All Problems</option>
                        <?php
                        $connexion = odbc_connect("test",'','') or dir(" Erreur");
                        $query = "SELECT * from Category";
                        $result = odbc_exec($connexion, $query);
                        
                        if(is_resource($result) and odbc_num_rows($result)>0){
                         
                          while($row = odbc_fetch_array($result)){
                            
                              echo" <option value='".$row['catId']."'>".$row['name']."</option> ";
                            
                          }
                          } 
                        ?>
                        </select>
                        </div>
                    </div>
                    
                <div class="form-group">
                <div class="row ">
                <label for="ProblemCategory" class="col-4 my-auto" style="color: #4b49ac;" >Problem List</label>
                    <select name="problems" id="ProblemCategory" class="form-select form-select-lg mb-3 col-6 my-auto" aria-label=".form-select-lg example">
                        <option  selected disabled style="display:none;">Select a Problem</option>
                        <?php
                        
                        $query = "SELECT * from Problems";
                        $result = odbc_exec($connexion, $query);
                        
                        if(is_resource($result) and odbc_num_rows($result)>0){
                         
                          while($row = odbc_fetch_array($result)){
                            
                              echo" <option value='".$row['probId']."'>".$row['type']."</option> ";
                            
                          }
                          } 
                        ?>
                        </select>    
                </div>
              </div>
                    <button class="btn btn-light">Cancel</button>
                    <input type="submit" name="submit" value="next" class="btn btn-primary mr-2"/>
                  </form>
                </div>
              </div>
            </div>
</div>
<?php

if(isset($_POST['submit'])){
  if ( empty($_SESSION) ) { session_start(); }
  
  $_SESSION['prob']=$_POST['problems'];
  $_SESSION['cat']=$_POST['category'];
  header("location:sigProb2.php");
}
?>


</body>