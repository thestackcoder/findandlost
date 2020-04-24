<?php
// Initialize the session
// Include config file
require_once "config.php";
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
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
        height: 485px;
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
    <?php require "partial/_header.php" ?>
    <div class="page-header">
        <h3>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to "FiLo".</h3>
        <h4>Add the item you have found</h4>
    </div>

    <div class="container">
        <div class="row">
            <div class="well col-md-6 col-md-offset-3">
            <form action="/action_page.php">
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color">
                </div>                  
                <div class="form-group">
                    <label for="desc">Category:</label>
                    <select class="form-control">
                        <option>Select</option>
                        <option>Phone</option>
                        <option>Pets</option>
                        <option>Jewellery</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="place">Found place:</label>
                    <input type="text" class="form-control" id="place">
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea class="form-control" id="pwd"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input class="form-control" type="file">
                </div>
                <button type="submit" class="btn btn-success btn-block">Send Request</button>
            </form>
        </div>
    </div>
</body>
</html>