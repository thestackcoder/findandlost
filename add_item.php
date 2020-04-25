<?php

require_once "config.php";
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['insert'])){

    $user_id = $_SESSION['id'];
    $color = $_POST['color'];
    $cateogry = $_POST['category'];
    $place = $_POST['place'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $name = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");

    if(in_array($imageFileType, $extensions_arr) ){
    
        $query = "INSERT INTO items(color, photo, description, found_place, phone_number, user_id, category_id) 
                VALUES ('$color', '$name', '$desc', '$place', '$phone', '$user_id', '$cateogry')";

        if ($conn->query($query) === TRUE) {
            header('Location: my_items.php?status=1');
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
            header('Location: my_items.php?status=0');
        }

    
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);

    }

    
    $conn->close();
    
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color" name="color" required>
                </div>                  
                <div class="form-group">
                    <label for="desc">Category:</label>
                    <select name="category" class="form-control">
                        <option></option>
                        <option value="1">Pets</option>
                        <option value="2">Phone</option>
                        <option value="3">Jewellery</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="place">Found place:</label>
                    <input type="text" class="form-control" id="place" name="place" required>
                </div>
                <div class="form-group">
                    <label for="place">Phone number:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="desc">Description:</label>
                    <textarea class="form-control" id="desc" name="desc"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input id="image" class="form-control" type="file" name="image">
                </div>
                <button type="submit" name="insert" id="insert" class="btn btn-success btn-block">Send Request</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#insert').click(function(){
                console.log('dfdf')
                var image = $('#image').val();
                if(image == ''){
                    alert("Please select image");
                    return false;
                }else{
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if(jQuery.inArray(extension, ['gif', 'jpeg', 'jpg', 'png']) == -1){
                        alert('Invalid image file');
                        $('#image').val('');
                        return false;
                    }
                }
            });
        });
    </script>

</body>
</html>
