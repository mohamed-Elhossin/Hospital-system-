<?php  include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
       include '../genral/functions.php';
       if(isset($_POST['send'])){
           $name = $_POST['name'];
           $insert = "INSERT INTO rooms VALUES (null , '$name')";
        $i =  mysqli_query($conn , $insert); 
        testMessage($i , "Insert");
       }
?>

<h1 class="display-5 text-center"> Add Room Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <lable>Room </lable>
                    <input type="text" name="name" class="form-control">
                </div>
                <button name="send" class="btn btn-info"> Send Data </button>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; ?>