<?php  include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
       include '../genral/functions.php';
       if(isset($_POST['send'])){
           $name = $_POST['name'];
           $depId = $_POST['depId'];
           $insert = "INSERT INTO doctors VALUES (null , '$name', $depId)";
        $i =  mysqli_query($conn , $insert); 
        testMessage($i , "Insert");
        header("location:/frhospital/doctors/list.php");
       }
       $name ="";
       $depId ="";
       $update = false;
       if(isset($_GET['edit'])){
           $update=true;
          $id = $_GET['edit'];
          $select = "SELECT * FROM doctors where id = $id";
          $ss = mysqli_query($conn , $select);
          $row = mysqli_fetch_assoc($ss);
          $name=$row['name'];
          $depId =$row['departmentId'];

  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $depId = $_POST['depId'];
    $update = "UPDATE doctors SET name = '$name'  , departmentId = $depId where id = $id";
 $u =  mysqli_query($conn , $update); 
 testMessage($u , "update");
 header("location:/frhospital/doctors/list.php");
  }
       }
?>

<h1 class="display-5 text-center"> Add Doctor Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <lable>Doctor </lable>
                    <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <lable>Department ID </lable>
                    <?php 
                 $select = "SELECT * FROM departments";
                 $s = mysqli_query($conn , $select);
                 ?>
                    <select name="depId" class="form-control">
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

<?php include '../shared/script.php'; ?>