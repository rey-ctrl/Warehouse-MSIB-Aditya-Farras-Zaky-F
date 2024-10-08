<?php
class Item {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    // Get all items
    public function getAllItems() {
        $query = "SELECT * FROM warehouse";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;
    }

    // Get item by ID
    public function getItemById($id) {
        $query = "SELECT * FROM warehouse WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("i", $id); // 'i' for integer
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Update an item
    public function updateItem($id, $name, $location, $capacity, $status, $opening_hour, $closed_hour) {
        $query = "UPDATE warehouse SET name = ?, location = ?, capacity = ?, status = ?, opening_hour = ?, closed_hour = ? WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("sssissi", $name, $location, $capacity, $status, $opening_hour, $closed_hour, $id);
        return $stmt->execute();
    }

    // Insert a new item
    public function insertItem($name, $location, $capacity, $status, $opening_hour, $closed_hour) {
        $query = "INSERT INTO warehouse (name, location, capacity, status, opening_hour, closed_hour) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("sssiss", $name, $location, $capacity, $status, $opening_hour, $closed_hour);
        return $stmt->execute();
    }

    public function deleteItem($id) {
        $id = mysqli_real_escape_string($this->con, $id);
        $query = "DELETE FROM warehouse WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param("i", $id); // 'i' is for an integer type
        return $stmt->execute();
    }
    
}
?>
