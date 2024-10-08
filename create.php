<?php
session_start();
require_once 'connection.php'; // Include your connection file
require_once 'Item.php'; // Include the Item class

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = new Item($con);

    $name = $_POST['name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $status = $_POST['status'];
    $opening_hour = $_POST['opening_hour'];
    $closed_hour = $_POST['closed_hour'];

    if ($item->insertItem($name, $location, $capacity, $status, $opening_hour, $closed_hour)) {
        $_SESSION['message'] = "Item successfully added!";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($con);
    }

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse</title>
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> ADD ITEMS
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="create.php" method="post">

                        <div class="mb-3">
                            <label>Items name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Capacity</label>
                            <input type="text" name="capacity" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                                <option value="dalam perbaikan">Dalam Perbaikan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Opening Hour</label>
                            <input type="time" name="opening_hour" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Closed Hour</label>
                            <input type="time" name="closed_hour" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="save_item" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>