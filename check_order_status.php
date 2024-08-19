<?php
session_start();
require 'db-connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Query untuk mendapatkan status pesanan berdasarkan email
    $query = "SELECT email, status FROM `order` WHERE email = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->execute([$email]);
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($orders) {
        $status_message = "";
        foreach ($orders as $order) {
            $status_message .= "Email: " . htmlspecialchars($order['email']) . "\n";
            $status_message .= "Status: " . htmlspecialchars($order['status']) . "\n\n";
        }
        $status_message = urlencode($status_message);
        header("Location: index.php?page=check_order_status&status_message=$status_message");
    } else {
        $status_message = urlencode("No orders found for the provided email address.");
        header("Location: index.php?page=check_order_status&status_message=$status_message");
    }
    exit();
}
?>
