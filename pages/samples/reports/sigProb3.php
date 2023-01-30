<?php
session_start();
echo $_SESSION['prob'].",".$_SESSION['cat'].",".$_SESSION['location'].",".$_SESSION['description'].",".$_SESSION['solution'];

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
<?php if (isset($_GET['error'])): ?>
		<p><?php echo $_GET['error']; ?></p>
	<?php endif ?>
     
<div class="row d-flex justify-content-center bg-transparent">
            <div class="col-md-6 grid-margin stretch-card ">
              <div class="card text-center">
                <div class="card-body">
                  <h4 class="card-title">Report a problem</h4>
                  <p class="card-description">
                    you will send this to admin so be precise 
                  </p>
                  <form class="pt-3"  action="upload.php" method="POST"  enctype="multipart/form-data">
                
                  <div class="custom-file">
                    
                    <label class="custom-file-label" for="validatedCustomFile">Choose An image type (jpg,jpeg,png)...</label><br>
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="my_image">  
                    
                </div>

                    <input type="submit" name="cancel" value="Previous"  class="btn btn-light"/>
                    <input type="submit" name="submit" value="Next" class="btn btn-primary mr-2"/>
                  </form>
                </div>
              </div>
            </div>
</div>

</body>