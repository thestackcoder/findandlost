<?php
require_once "../config.php";
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<style type="text/css">
    .page-header{ text-align: center; }
    .card{
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        transition: 0.3s;
    }
    .card:hover{
        box-shadow: 3px 3px 12px #bbbbbb9f;
        background-color: seagreen;
        color: #fff;
        transition: 0.3s;
    }
    img{
        width: 100%;
        margin-bottom: 20px;
        height: 300px;
    }
    .col-md-3{
        margin-top: 10px;
        margin-bottom: 10px;
    }
    </style>
<body>
    <?php require '../partial/_adminHeader.php' ?>
    <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to "FiLo".</h3>
    </div>
    <h3 style="text-align:center;">All Items</h3><br>
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT item_id, color, photo, description, created_at, phone_number, category.name, user_id, accepted FROM items INNER JOIN category 
                        ON items.category_id = category.category_id;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-md-3">
                        <div class="card">
                            <!-- <img src="../uploads/<?php echo $row['photo']; ?>" /> -->
                            <div class="detail">             
                                <h4><span><b>Category</b></span> : <?php echo $row['name'];?></h4>
                                <span><b>Color</b></span> : <span><?php echo $row['color'];?></span>
                                <br>                             
                                <i><span><b>Phone</b></span> : <?php echo $row['phone_number'];?></i>
                                <br>
                                <i><span><b>Date</b></span> : <?php echo $row['created_at'];?></i>
                                <br>
                            </div>                    
                            <br>
                            <a href="detail_item.php?id=<?php echo $row['item_id']; ?>" class="btn btn-warning" data-toggle="modal" data-target="#myModal">View Details</a>
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
</body>
</html>