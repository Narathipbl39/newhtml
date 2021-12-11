<?php
require __DIR__ . "/../config/database.php";

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

function InsertData($ticket_id, $users_id)
{
    $sql = "INSERT INTO `users_ticket`(`ticket_id`, `users_id`) VALUES ('$ticket_id','$users_id')";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function ChangeStatus($id)
{
    $sql = "UPDATE `ticket` SET `status`= '1' WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function GetticketById($id)
{
    $sql = "SELECT * FROM `ticket` WHERE id = $id";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}

if (isset($_GET['method']) && $_GET['method'] == "AddData") {
    require __DIR__ . "/../config/define.php";

    $ticket_id = $_POST['ticket_id'];
    $users_id = $_POST['users_id'];

    $response = InsertData($ticket_id, $users_id);
    $changestatus = ChangeStatus($ticket_id);

    if (!$response && !$changestatus) {
?>
        <script>
            alert('บันทึกไม่สำเร็จ');
            window.location.replace("<?= WEBSITE_URL ?>");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('บันทึกเรียบร้อย');
            window.location.replace("<?= WEBSITE_URL ?>");
        </script>
<?php
    }
}

function GetticketMe($id)
{
   
    $response = array();

    $sql = "SELECT * FROM `users_ticket` WHERE `users_id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}
