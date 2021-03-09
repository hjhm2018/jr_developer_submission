<?php

session_start();

error_reporting(0);
header('Content-type: application/json; charset=utf-8');

$connection = new mysqli('localhost', 'root', '', 'warehouse');

if ($connection->connect_errno) {
    $response = [
        'error' => true
    ];
} else {
    $connection->set_charset("utf8");
    $statement = $connection->prepare("SELECT * FROM items");
    $statement->execute();
    $results = $statement->get_result();

    $response = [];

    while ($row = $results->fetch_assoc()) {
        $item = [
            'itemID'         => $row['itemID'],
            'itemName'     => $row['itemName'],
            'itemWeight'        => $row['itemWeight'],
            'itemLength'        => $row['itemLength'],
            'itemWidth'    => $row['itemWidth'],
            'itemHeight'    => $row['itemHeight']
        ];
        array_push($response, $item);
    }
}

echo json_encode($response);
