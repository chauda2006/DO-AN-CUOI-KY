<?php

require_once "database.php";

function getAllDestinations()
{
    global $pdo;

    $sql = "SELECT destinations.*, categories.name AS category_name
            FROM destinations
            LEFT JOIN categories ON destinations.category_id = categories.id
            ORDER BY destinations.id DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getDestinationById(int $id): ?array
{
    global $pdo;

    $sql = "SELECT destinations.*, categories.name AS category_name
            FROM destinations
            LEFT JOIN categories ON destinations.category_id = categories.id
            WHERE destinations.id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllCategories()
{
    global $pdo;

    $sql = "SELECT * FROM categories ORDER BY id ASC";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function searchDestinations(string $keyword): array
{
    global $pdo;

    $sql = "SELECT destinations.*, categories.name AS category_name
            FROM destinations
            LEFT JOIN categories ON destinations.category_id = categories.id
            WHERE destinations.title LIKE ?
               OR destinations.location LIKE ?
               OR categories.name LIKE ?
            ORDER BY destinations.id DESC";

    $stmt = $pdo->prepare($sql);

    $search = "%" . $keyword . "%";

    $stmt->execute([$search, $search, $search]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}