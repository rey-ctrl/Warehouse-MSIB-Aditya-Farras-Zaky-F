<?php
session_start();
require 'connection.php';  // This sets up the $con variable
require 'Item.php';        // Include the Item class

$item = new Item($con);    // Pass the $con connection to the Item class

if (isset($_POST['update_item'])) {
    $id = $_POST['item_id'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closed_hour = $_POST['closed_hour'];

    // Update the item using the updateItem method in the Item class
    if ($item->updateItem($id, $name, $location, $capacity, $status, $opening_hour, $closed_hour)) {
        $_SESSION['message'] = "Item Updated Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Item Not Updated";
        header("Location: edit.php?id=$id");
        exit(0);
    }
}
?>
