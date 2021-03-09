<?php

session_start();

error_reporting(0);
header('Content-type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $itemName = $_POST['itemName'];
    $weight = $_POST['itemWeight'];
    $length = $_POST['itemLength'];
    $width = $_POST['itemWidth'];
    $height = $_POST['itemHeight'];

    function validateData($itemName, $weight, $length, $width, $height)
    {
        if ($itemName == '') {
            return false;
        } elseif ($weight == '') {
            return false;
        } elseif ($length == '') {
            return false;
        } elseif ($width == '') {
            return false;
        } elseif ($height == '') {
            return false;
        }
        return true;
    }

    if (validateData($itemName, $weight, $length, $width, $height)) {
        $connection = new mysqli('localhost', 'root', '', 'warehouse');
        $connection->set_charset('utf8');

        if ($connection->connect_errno) {
            $response = ['error' => true];
        } else {

            $statement = $connection->prepare("INSERT INTO items(itemName, itemWeight, itemLength, itemWidth, itemHeight) VALUES(?,?,?,?,?)");

            $statement->bind_param("sssss", $itemName, $weight, $length, $width, $height);
            $statement->execute();

            if ($connection->affected_rows <= 0) {
                $response = ['error' => true];
            }

            $response = [];
        }
    } else {
        $response = ['error' => true];
    }
}

echo json_encode($response);
