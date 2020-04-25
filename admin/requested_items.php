<?php
require_once "../config.php";
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$message = '';

if(isset($_GET['status'])){
    $status = $_GET['status'];
    if($status == 1){
       $message = 'Request accepted successfully.';
    }else if($status == 0){
       $message = 'Unable to accept request, please try again.';
    }
}

$delete_message = '';

if(isset($_GET['deleted'])){
    $status = $_GET['deleted'];
    if($status == 1){
       $delete_message = 'Request deleted successfully.';
    }else if($status == 0){
       $delete_message = 'Unable to delete request, please try again.';
    }
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    .page-header{ text-align: center; }
    .card{
        padding: 15px 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
    }
    .card:hover{
        box-shadow: 3px 3px 12px #bbbbbb9f;
    }
    img{
        width: 100%;
        margin-bottom: 20px;
        height: 300px;
    }

    </style>
</head>
<body>
    <?php require "../partial/_adminHeader.php" ?>
    <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to "FiLo".</h3>
    </div>
    <h3 style="text-align:center;">Requested Items</h3><br>
    <div class="container">
        <div class="row">
            <div class="alert">
                <strong style="color:#5cb85c; font-size: 18px;"><?php echo $message; ?></strong> 
                <strong style="color: #d9534f;; font-size: 18px;"><?php echo $delete_message; ?></strong> 
            </div>
            <?php
            $sql = "SELECT item_id, color, photo, description, created_at, phone_number, category.name, user_id, accepted FROM items INNER JOIN category 
                        ON items.category_id = category.category_id WHERE items.accepted is False";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-md-4">
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
                            <a href="detail_item.php?id=<?php echo $row['item_id']; ?>" class="btn btn-default" data-toggle="modal" data-target="#myModal">Details</a>
                            <a href="accept_request.php?id=<?php echo $row['item_id']; ?>" class="btn btn-success" data-toggle="modal" data-target="#myModal">Accept Request</a>
                            <a href="refuse_request.php?id=<?php echo $row['item_id']; ?>" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Refuse Request</a>
                           
                        </div>
                    </div>  
            <?php
                    }
                } else {
                    ?>
                    <h4 style="margin-left: 16px;">There are no requests for items.</h4>
                    <?php
                }
                $conn->close();
            ?>
        </div>
    </div>
</body>
</html>