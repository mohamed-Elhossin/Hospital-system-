<?php 



function testMessage($condation , $mess){
    if($condation){
        echo "<div class='alert alert-info w-50 mx-auto text-center'>
        <h5>  $mess  is True </h5> 
     </div>
     ";
    }else{
        echo "<div class='alert alert-danger text-center w-50 mx-auto'>
        <h5>  $mess  Is False </h5> 
     </div>
     ";
    }

}
function auth(){
    if($_SESSION['admin']){

    }else{
        header("location:/frhospital/admin/login.php");
    }
    
}

auth();
?>