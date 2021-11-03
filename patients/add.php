<?php  include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
       include '../genral/functions.php';
       if($_SESSION['role'] == 0 || $_SESSION['role'] == 1){
       if(isset($_POST['send'])){
           $name = $_POST['name'];
           $status = $_POST['status'];
           $roomId = $_POST['roomId'];
           $doctorId = $_POST['doctorId'];
           $insert = "INSERT INTO patients VALUES (null , '$name', '$status',$roomId, $doctorId)";
        $i =  mysqli_query($conn , $insert); 
        testMessage($i , "Insert");
        header("location:/frhospital/patients/list.php");
       }
       $name ="";
       $status ="";
       $update = false;
       if(isset($_GET['edit'])){
           $update=true;
          $id = $_GET['edit'];
          $select = "SELECT * FROM patients where id = $id";
          $ss = mysqli_query($conn , $select);
          $row = mysqli_fetch_assoc($ss);
          $name=$row['name'];
          $status =$row['status'];

  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $status = $_POST['status'];
    $roomId = $_POST['roomId'];
    $doctorId = $_POST['doctorId'];
    $update = "UPDATE patients SET name = '$name'  , status = '$status', roomId = $roomId  , doctorId  =$doctorId   where id = $id";
 $u =  mysqli_query($conn , $update); 
 testMessage($u , "update");
 header("location:/frhospital/patients/list.php");
  }
       }
?>

<h1 class="display-5 text-center"> Add patiens Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <lable>patiens Name</lable>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>patiens Status </lable>
                    <input type="text" value="<?php echo $status ?>" name="status" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Room ID </lable>
                    <?php 
                 $select = "SELECT * FROM rooms";
                 $s = mysqli_query($conn , $select);
                 ?>
                    <select name="roomId" class="form-control">
                        <?php  foreach($s as $date){ ?>
                        <option value=" <?php echo $date['id']?>"> <?php echo $date['name']?> </option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <lable>Doctors ID </lable>
                    <?php 
                 $select = "SELECT * FROM doctors";
                 $s = mysqli_query($conn , $select);
                 ?>
                    <select name="doctorId" class="form-control">
                        <?php  foreach($s as $date){ ?>
                        <option value=" <?php echo $date['id']?>"> <?php echo $date['name']?> </option>
                        <?php }?>
                    </select>
                </div>
                <?php if($update): ?>
                <button class="btn btn-primary" name="update"> Update</button>
                <?php else :?>
                <button name="send" class="btn btn-info"> Send Data </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; }?>