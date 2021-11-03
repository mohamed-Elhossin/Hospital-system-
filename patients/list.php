<?php  include_once '../shared/header.php' ;
       include_once '../shared/nav.php';
       include_once '../genral/conn.php';
       include_once '../genral/functions.php';
?>
<?php 
$select = "SELECT * FROM patients ";
$s = mysqli_query($conn , $select);

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   $delete = "DELETE FROM patients WHERE id = $id";
   $d = mysqli_query($conn,$delete);
header("location:/frhospital/patients/list.php");
}

?>

<h1 class="display-5 text-center"> Add Doctors Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name </th>
                    <th>stutas</th>
                    <th>Actions</th>
                </tr>
                <?php foreach($s as $data){ ?>
                <tr>
                    <th><?php echo $data['id'] ?> </th>
                    <th><?php echo $data['name'] ?> </th>
                    <th><?php echo $data['status'] ?> </th>
                    <th> <a onclick="return confirm('are your sure !!')" href="/frhospital/patients/list.php?delete=<?php echo $data['id'] ?>"
                            class="btn btn-danger">Delete </a> </th>
                            <th> <a  href="/frhospital/patients/add.php?edit=<?php echo $data['id'] ?>"
                            class="btn btn-info">Edit </a> </th>
                </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>

<?php include_once '../shared/script.php'; ?>