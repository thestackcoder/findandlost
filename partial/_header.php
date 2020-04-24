<style>
    .navbar{
        border-radius: 0px;
    }
</style>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><b>FiLo</b></a>
        </div>
         
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            <ul class="nav navbar-nav">
                <li><a href="welcome.php"> Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a style="margin-top: 7px;" href="add_item.php" class="btn btn-info">Add Found Item</a>
                <a style="margin-top: 7px;" href="logout.php" class="btn btn-danger">Logout</a>
            </ul>
        <?php } else {?>
            <ul class="nav navbar-nav">
                <li><a href="index.php"> Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        <?php } ?>
    </div>
</nav>