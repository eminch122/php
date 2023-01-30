<?php
session_start();
if($_SESSION["type"]!="admin"){
  header("location:../error-404.html");
}
    $connexion = odbc_connect("test",'','') or dir(" Erreur");
    $id=$_GET['updateid'];
      
        if(isset($_POST["submit"])){
            
            $name=$_POST["name"];
            $lastname=$_POST["lastname"];
            $email=$_POST["email"];
            $password=$_POST["pwd"];
            $tel=$_POST["tel"];
            
            $query="update Users
            set name='$name', last_name='$lastname', email='$email', password='$password' , tel= '$tel'
            where userId=$id";
            $result = odbc_exec($connexion, $query); 
            if($result){
                header("location:manageUsers.php");
            }else{
                echo'sorry';
            }

        

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
<body>
<div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Default form</h4>
                  <p class="card-description">
                    Basic form layout
                  </p>
                  
                  <form class="forms-sample" method="POST">
                  <?php
                  $connexion = odbc_connect("test",'','') or dir(" Erreur");
                  $id=$_GET['updateid'];
                  $query = "SELECT * from Users where userId=$id";
                  $result = odbc_exec($connexion, $query); 
                  if(is_resource($result) and odbc_num_rows($result)>0){
                    while($row = odbc_fetch_array($result)){
                      $name=$row['name'];
                      $lastname=$row['last_name'];
                      $email=$row['email'];
                      $tel=$row['tel'];
                      $password=$row['password'];
                    }}
                  ?>  
                    
                  <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputName1" placeholder="Name" name="name" value="<?php echo $name ?>">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputLastname1" placeholder="Lastname" name="lastname" value="<?php echo $lastname?>">
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" value="<?php echo $email?>">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputTel1" placeholder="Tel"  name="tel" value="<?php echo $tel?>">
                </div>
               
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"  name="pwd" value="<?php echo $password?>">
                </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary mr-2"/>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</body>
</html>