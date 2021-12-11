<?php
require __DIR__ . "/../config/database.php";

function GetBusAll()
{
    $response = array();

    $sql = "SELECT * FROM `bus`";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}

function GetBusById($id)
{
    $sql = "SELECT * FROM `bus` WHERE id = $id";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}

function GetCarallById($id)
{
    $sql = "SELECT * FROM `driver` WHERE id = $id";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}