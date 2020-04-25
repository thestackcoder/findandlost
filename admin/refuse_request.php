<?php

require '../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM items WHERE item_id='".$id."'";

if ($conn->query($sql) === TRUE) {
    header('Location: requested_items.php?deleted=1');
} else {
    echo "Error updating record: " . $conn->error;
    header('Location: requested_items.php?deleted=0');
}

$conn->close();

?>