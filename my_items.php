<?php

require_once "config.php";
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
    <style type="text/css">
    .page-header{ text-align: center; }
    .card{
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }
    .card:hover{
        box-shadow: 3px 3px 12px #bbbbbb9f;
    }
    img{
        width: 100%;
        margin-bottom: 20px;
        height: 300px;
    }
    .col-md-3{
        margin-bottom: 15px;
    }
    </style>
</head>
<body>
    <?php 
        require "partial/_header.php";
        $message = '';

        if(isset($_GET['status'])){
            $status = $_GET['status'];
            if($status == 1){
            $message = 'Request sent successfully.';
            }else if($status == 0){
            $message = 'Unable to send request, please try again.';
            }
        }
    ?>
    <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to "FiLo".</h3>
        <h4>The FIND and LOST Sysmem</h4>
    </div>
    <h3 style="text-align:center;">Requested Items</h3><br>
    <div class="container">
        <div class="row">
            <div class="alert">
                <strong style="color:#5cb85c; font-size: 18px;"><?php echo $message; ?></strong> 
            </div>
            <?php
            $sql = "SELECT item_id, color, photo, description, created_at, category.name, user_id, accepted FROM items INNER JOIN category 
                        ON items.category_id = category.category_id WHERE items.user_id = '".$_SESSION['id']."'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="uploads/<?php echo $row['photo']; ?>" />
                            <div class="detail">             
                                <h4><span><b>Category</b></span> : <?php echo $row['name'];?></h4>
                                <span><b>Color</b></span> : <span><?php echo $row['color'];?></span>
                                <br>
                                <i><span><b>Date</b></span> : <?php echo $row['created_at'];?></i>
                                <br>
                            </div>
                            <?php 
                                if($row['accepted'] == FALSE){
                                ?>
                                    <br><span style="color: red;">Request not accepted yet.</span><br>
                                <?php
                                }else{
                                ?>
                                    <br><span style="color: green">Acepted!</span><br>
                                <?php
                                }
                            ?>
                            <br>
                            <a href="detail_item.php?id=<?php echo $row['item_id']; ?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View Details</a>
                           
                        </div>
                    </div>  
            <?php
                    }
                } else {
                    echo "No item added.";
                }
                $conn->close();
            ?>
        </div>
    </div>
</body>
</html>