<?php
session_start();
require 'connection.php';  // Include the database connection file
require 'Item.php';        // Include the Item class

$item = new Item($con);

if (isset($_POST['delete_item'])) {
    $item_id = $_POST['delete_item'];

    if ($item->deleteItem($item_id)) {
        $_SESSION['message'] = "Item Deleted Successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Item Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}
?>
