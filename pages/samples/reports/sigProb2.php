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
   

<div class="row d-flex justify-content-center bg-transparent">
            <div class="col-md-6 grid-margin stretch-card ">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Report a problem</h4>
                  <p class="card-description">
                    you will send this to admin so be precise 
                  </p>
                  <form class="pt-3"  method="POST">
               
                <div class="form-group">
                    <label for="exampleInputLocation1">Location</label>
                    <input type="text" class="form-control form-control-lg" id="exampleInputLocation1" placeholder="Location" name="location">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" placeholder="Description.." name="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea2">Solutions (optional)</label>
                    <textarea class="form-control form-control-lg" id="exampleFormControlTextarea2" rows="3" placeholder="Solution.." name="solution"></textarea>
                </div>
                    <input type="submit" name="cancel" value="Previous"  class="btn btn-light"/>
                    <input type="submit" name="submit" value="Next" class="btn btn-primary mr-2"/>
                  </form>
                </div>
              </div>
            </div>
</div>
<?php
if(isset($_POST['cancel'])){
    unset($_SESSION['prob']);
    unset($_SESSION['cat']);
    header("location:sigProb.php"); 
}elseif(isset($_POST['submit'])){
    $location=$_POST['location'];
    $description=$_POST['description'];
    $solution=$_POST['solution'];
    if ( empty($_SESSION) ) { session_start(); }
    $_SESSION['location']=$location;
    $_SESSION['description']=$description;
    $_SESSION['solution']=$solution;
    header("location:sigProb3.php"); 
}
?>
</body>