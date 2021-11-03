<?php 
       include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
    //    include '../genral/functions.php';

       if(isset($_POST['loign'])){
           $name = $_POST['name'];
           $password = $_POST['password'];
     $select = "SELECT * FROM admin where name = '$name' and password ='$password'";
     $s=mysqli_query($conn ,$select);
     $numRow =mysqli_num_rows($s);
     $row = mysqli_fetch_assoc($s);
     if($numRow > 0){
   $_SESSION['admin'] = $name;
   $_SESSION['role'] = $row['role'];
     header('location:/frhospital/index.php');
     }else{
         echo"Not Admin";
     }
  }

  print_r($_SESSION);
?>

<h1 class="display-5 text-center"> Login Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <lable>User Name </lable>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>User Password </lable>
                    <input type="password" name="password" class="form-control">
                </div>
                <button name="loign" class="btn btn-info"> Login </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; ?>