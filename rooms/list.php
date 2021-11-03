<?php  include '../shared/header.php' ;
       include '../shared/nav.php';
       include '../genral/conn.php';
       include '../genral/functions.php';
$select = "SELECT * FROM rooms";
$s = mysqli_query($conn , $select);
?>

<h1 class="display-5 text-center"> Add Room Page </h1>

<div class="container col-md-6">
    <div class="card">
        <div class="card-body">
         <table class="table table-dark">
             <tr>
                 <th>ID</th>
                 <th>Room</th>
             </tr>
             <?php foreach($s as $data){ ?>
             <tr>
                 <th><?php echo $data['id'] ?> </th>
                 <th><?php echo $data['name'] ?> </th>
             </tr>
             <?php }?>
         </table>
        </div>
    </div>
</div>

<?php include '../shared/script.php'; ?>