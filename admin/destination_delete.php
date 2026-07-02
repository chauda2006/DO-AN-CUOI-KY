<?php

require 'check_admin.php';
require '../config/database.php';

$id = $_GET["id"] ?? 0;

$sql = "SELECT image
        FROM destinations
        WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

$destination = $stmt->fetch();

if (
    $destination &&
    $destination["image"] != "" &&
    file_exists("../assets/images/" . $destination["image"])
) {

    unlink("../assets/images/" . $destination["image"]);

}

$sql = "DELETE
        FROM destinations
        WHERE id = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

header("Location: destinations.php?msg=Xóa thành công");

exit;