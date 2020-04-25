<?php
    require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Welcome to FiLo</title>
</head>
<style>
    .card{
        padding: 15px 12px;
        border-radius: 10px;
        background: #f8f8f8;
    }
    .card:hover{
        box-shadow: 3px 3px 15px #99999f;
    }
    span{
        text-align: center;
    }
    h4{
        text-transform: Capitalize;
    }
    .jumbotron{
        padding-top: 30px;
        padding-bottom: 30px;
        background: seagreen;
        margin-top: -20px;
        color: #fff;
    }
    body{
        background: #eee;
    }
</style>
<body>
    <?php require "partial/_header.php" ?>

    <h2 class="jumbotron" style="text-align: center;">Have you lost something? Find your precious thing here...</h2>

    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT item_id, color, description, created_at, category.name FROM items INNER JOIN category ON items.category_id = category.category_id;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-md-3">
                        <div class="well card">
                            <div class="detail">             
                                <h4><span><b>Category</b></span> : <?php echo $row['name'];?></h4>
                                <span><b>Color</b></span> : <span><?php echo $row['color'];?></span>
                                <br>
                                <i><span><b>Date</b></span> : <?php echo $row['created_at'];?></i>
                                <br><br>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Details</button>
                        </div>
                    </div>  
            <?php
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>In order to see the details please login or sign up if you don't have an account.</p>
            <p>
                <a href="register.php" class="btn btn-info">Sign up</a>
                <a href="login.php" class="btn btn-default">Login</a>
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>

    </div>
    </div>

</body>

</html>