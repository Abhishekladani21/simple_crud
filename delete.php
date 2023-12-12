<?php
include "config.php";

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM `users` WHERE `id` = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Deletion successful
        echo "<script>confirm('User deleted successfully');</script>";
    } else {
        // Deletion failed
        echo "<script>alert('Failed to delete user');</script>";
    }

    $stmt->close();
}

// Redirect to the index page after deletion
echo "<script>window.location.href = 'index.php';</script>";
?>
