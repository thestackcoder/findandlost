<style>
    .navbar{
        border-radius: 0px;
    }
    .navbar a{
        font-size: 15px;
        color: #f7f7f7 !important;
    }
    .navbar a:hover{
        color: #fff !important;
    }
    .navbar .navbar-header a{
        font-size: 22px;
        color: #efefef;
    }
</style>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php"><b>FILO</b></a>
        </div>
         
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
            <ul class="nav navbar-nav">
                <li><a href="welcome.php"> Home</a></li>
                <li><a href="my_items.php"> Sent Requests</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <a style="margin-top: 7px;" href="add_item.php" class="btn btn-primary">Add Found Item</a>
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