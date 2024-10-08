<?php
session_start();
require 'connection.php'; // Include your database connection file
require 'Item.php'; // Include the Item class

$item = new Item($con);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Item</title>
</head>
<body>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Item
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $item_id = $_GET['id'];
                        $item_data = $item->getItemById($item_id);

                        if ($item_data) {
                            ?>
                            <form action="update_item.php" method="POST">
                                <input type="hidden" name="item_id" value="<?= $item_data['id']; ?>">

                                <div class="mb-3">
                                    <label>Item Name</label>
                                    <input type="text" name="name" value="<?= $item_data['name']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Location</label>
                                    <input type="text" name="location" value="<?= $item_data['location']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Capacity</label>
                                    <input type="text" name="capacity" value="<?= $item_data['capacity']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="aktif" <?= $item_data['status'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="tidak aktif" <?= $item_data['status'] == 'tidak aktif' ? 'selected' : ''; ?>>Tidak Aktif</option>
                                        <option value="dalam perbaikan" <?= $item_data['status'] == 'dalam perbaikan' ? 'selected' : ''; ?>>Dalam Perbaikan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Opening Hour</label>
                                    <input type="time" name="opening_hour" value="<?= $item_data['opening_hour']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Closed Hour</label>
                                    <input type="time" name="closed_hour" value="<?= $item_data['closed_hour']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_item" class="btn btn-primary">
                                        Update Item
                                    </button>
                                </div>

                            </form>
                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
