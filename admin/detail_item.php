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
    <title>Admin - Item detail page</title>
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
    }

    </style>
</head>
<body>
    <?php require "../partial/_adminHeader.php" ?>
    <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to "FiLo".</h3>
        <h4>The FIND and LOST Sysmem</h4>
    </div>

    <div class="container">
        <div class="row">
            <?php
            $item_id = $_GET['id'];
            $sql = "SELECT item_id, color, photo, description, phone_number, found_place, created_at, category.name, accepted FROM items INNER JOIN category 
                        ON items.category_id = category.category_id WHERE items.item_id ='".$item_id."'";
                $result = $conn->query($sql);
                if ($result) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../uploads/<?php echo $row['photo']; ?>" />                            
                        </div>
                    </div>  
                    <div class="col-md-7">
                        <div class="detail">             
                            <h4><span><b>Category</b></span> : <?php echo $row['name'];?></h4>
                            <br>
                            <span><b>Color</b></span> : <span><?php echo $row['color'];?></span>
                            <br><br>                        
                            <span><b>Phone Number</b></span> : <span><?php echo $row['phone_number'];?></span>
                            <br><br>
                            <span><b>Place</b></span> : <span><?php echo $row['found_place'];?></span>
                            <br><br>
                            <i><span><b>Description</b></span> : <?php echo $row['description'];?></i>
                            <br><br>
                            <i><span><b>Date</b></span> : <?php echo $row['created_at'];?></i>
                            <br><br>
                            <?php
                                if($row['accepted'] == True){
                                    ?>
                                        <span style="color:green;">Request Accepted!</span>
                                    <?php
                                }else{
                                    ?>
                                        <a href="accept_request.php?id=<?php echo $row['item_id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#myModal">Accept Request</a>
                                        <a href="refuse_request.php?id=<?php echo $row['item_id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Refuse Request</a>

                                    <?php
                                }
                            ?>

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