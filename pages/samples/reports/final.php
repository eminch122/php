<?php
session_start();
echo $_SESSION['prob'].",".$_SESSION['cat'].",".$_SESSION['location'].",".$_SESSION['description'].",".$_SESSION['solution'].",".$_SESSION['image'].",".$_SESSION["userId"]; 
$probId=$_SESSION['prob'];
$catId=$_SESSION['cat'];
$location=$_SESSION['location'];
$description=$_SESSION['description'];
$solution=$_SESSION['solution'];
$image=$_SESSION['image'];
$userId=$_SESSION['userId'];
 


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
                    make sure that this is what you want to send 
                  </p>
                  <form class="pt-3"  action="" method="POST"  enctype="multipart/form-data">
                
                  <p class="card-description">Add class <code>.list-ticked</code> to <code>&lt;ul&gt;</code></p>
                  <ul class="list-arrow">
                    <?php
                    echo " <li><img class='img-fluid' src='uploads/$image' alt='ok'/></li>
                    <li>$location</li>
                    <li>$description</li>
                    <li>$solution</li>
                   "
                    ?>
                  </ul>
                

                    <input type="submit" name="cancel" value="Previous"  class="btn btn-light"/>
                    <input type="submit" name="submit" value="Send" class="btn btn-primary mr-2"/>
                  </form>
                </div>
              </div>
            </div>
</div>
<?php
if (isset($_POST["submit"])){
    $connexion = odbc_connect("test",'','') or dir(" Erreur");
    $query = "INSERT INTO Reports (location , description, solution,image,status,probId, userId) VALUES ('$location','$description','$solution','$image','Pending','$probId','$userId')";
    $result = odbc_exec($connexion, $query); 
    header("location:viewReports.php");
}


?>
</body>


