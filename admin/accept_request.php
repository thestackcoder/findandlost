<?php

require '../config.php';

$id = $_GET['id'];

$sql = "UPDATE items SET accepted = True WHERE item_id='".$id."'";

if ($conn->query($sql) === TRUE) {
    header('Location: requested_items.php?status=1');
} else {
    echo "Error updating record: " . $conn->error;
    header('Location: requested_items.php?status=0');
}

$conn->close();

?>