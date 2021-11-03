<?php  session_start();

if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location:/frhospital/admin/login.php");
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if(isset($_SESSION['admin'])): ?>
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Department
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/frhospital/department/add.php">Add Department</a>
                    <a class="dropdown-item" href="/frhospital/department/list.php">List Department</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Doctors
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/frhospital/doctors/add.php">Add Doctors</a>
                    <a class="dropdown-item" href="/frhospital/doctors/list.php">List Doctors</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    Roomes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/frhospital/rooms/add.php">Add Roomes</a>
                    <a class="dropdown-item" href="/frhospital/rooms/list.php">List Roomes</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    patients
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/frhospital/patients/add.php">Add patients</a>
                    <a class="dropdown-item" href="/frhospital/patients/list.php">List patients</a>
                </div>
            </li>
            <?php if($_SESSION['role'] == 0) :?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    admins
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/frhospital/admin/add.php">Add admins</a>
                </div>
            </li>
            <?php endif; ?>
            <form class="form-inline my-2 my-lg-0">
                 <button name="logout" class="btn btn-outline-success my-2 my-sm-0"  > logout</button> 
            </form>
            <?php else: ?>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <a href="/frhospital/admin/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</a>
        </form>
        <?php endif; ?>
    </div>
</nav>