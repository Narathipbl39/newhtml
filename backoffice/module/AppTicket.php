<?php
require __DIR__ . "/../../config/database.php";

function Gettickert($type, $id)
{
    if ($type == 1) {
        $where = "LIMIT 12 OFFSET 0";
    } else if ($type == 2) {
        $where = "LIMIT 12 OFFSET 12";
    } else if ($type == 3) {
        $where = "LIMIT 12 OFFSET 24";
    }
    $response = array();

    $sql = "SELECT * FROM `ticket` WHERE `bus_id` = '$id' $where";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}
