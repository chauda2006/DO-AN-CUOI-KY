<?php

require_once "../config/database.php";

function getAllLocations(){

    global $conn;

    $sql="SELECT * FROM locations";

    $stmt=$conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}