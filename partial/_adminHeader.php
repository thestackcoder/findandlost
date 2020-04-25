<style>
    .navbar{
        border-radius: 0px;
    }
    .navbar a{
        font-size: 15px;
    }
    .navbar .navbar-header a{
        font-size: 22px;
    }
</style>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><b>FILO</b></a>
        </div>
         
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            <ul class="nav navbar-nav">
                <li><a href="dashboard.php"> Home</a></li>
                <li><a href="requested_items.php"> Requested Items</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a style="margin-top: 7px;" href="admin_logout.php" class="btn btn-danger">Logout</a>
            </ul>
        <?php } else {?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login as user</a></li>
            </ul>
        <?php } ?>
    </div>
</nav>