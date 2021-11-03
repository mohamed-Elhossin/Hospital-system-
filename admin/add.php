<?php  include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
       include '../genral/functions.php';
       if($_SESSION['role'] == 0 ){
       if(isset($_POST['send'])){
           $name = $_POST['name'];
           $password = $_POST['password'];
           $role= $_POST['role'];
           $insert = "INSERT INTO `admin` VALUES (null , '$name', '$password' , $role)";
           $i =  mysqli_query($conn , $insert); 
           testMessage($i , "Insert Admin");
        // header("location:/frhospital/doctors/list.php");
       }
     
?>

<h1 class="display-5 text-center"> Add Admin Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <lable>Admin Name </lable>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Admin password </lable>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Admin Role </lable>
                    <select name="role" class="form-control">
                        <option value="0"> Owner </option>
                        <option value="1">All Access </option>
                        <option value="2">simi Access </option>
                    </select>
                </div>
                <button name="send" class="btn btn-info"> Send Admin </button>
            </form>
        </div>
    </div>
</div>

<?php  include '../shared/script.php'; }
else{
    echo "<img src='https://previews.123rf.com/images/pockygallery/pockygallery1608/pockygallery160800137/61652459-not-authorized-red-stamp-text-on-white.jpg'>";}
?>