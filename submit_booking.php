<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $length = $_POST['length'];
    $width = $_POST['width'];
    $depth = $_POST['depth'];
    $quantity = $_POST['quantity'];
    $box_type = $_POST['box_type'];
    $transparent = $_POST['transparent'];
    $decoration = $_POST['decoration'];
    $has_dividers = $_POST['has_dividers'];
    $divider_count = isset($_POST['divider_count']) ? $_POST['divider_count'] : null;

    $stmt = $pdo->prepare("INSERT INTO bookings (length_cm, width_cm, depth_cm, quantity, box_type, transparent, decoration, has_dividers, divider_count) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([$length, $width, $depth, $quantity, $box_type, $transparent, $decoration, $has_dividers, $divider_count]);

    header("Location: thank_you.html");
    exit;
} else {
    echo "طريقة الإرسال غير مسموحة.";
}
?>