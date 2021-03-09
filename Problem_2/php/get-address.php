<?php

error_reporting(0);
header('Content-type: application/json; charset=utf-8');

$connection = new mysqli('localhost', 'root', '', 'company_db');

if ($connection->connect_errno) {
    $response = [
        'error' => true
    ];
} else {
    $connection->set_charset("utf8");
    $statement = $connection->prepare("SELECT firstName, lastName, address, city, province, postalCode, moveInDate FROM employees, addresses, provinces  WHERE employees.employeeID = addresses.employeeID AND addresses.provinceID = provinces.provinceID");
    $statement->execute();
    $results = $statement->get_result();

    $response = [];

    while ($row = $results->fetch_assoc()) {
        $item = [
            'firstName'         => $row['firstName'],
            'lastName'     => $row['lastName'],
            'address'        => $row['address'],
            'city'        => $row['city'],
            'province'    => $row['province'],
            'postalCode'    => $row['postalCode'],
            'moveInDate'    => $row['moveInDate']
        ];
        array_push($response, $item);
    }
}

echo json_encode($response);
