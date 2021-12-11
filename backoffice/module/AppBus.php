<?php
require __DIR__ . "/../../config/database.php";

function GetBusAll()
{
    $sql = "SELECT * FROM `bus`";
    $query = $GLOBALS['conn']->query($sql);

    if ($query->num_rows > 0) {
        while ($result = $query->fetch_assoc()) {
            $response[] = $result;
        }
        return $response;
    } else {
        return false;
    }
}

function GetBusById($id)
{
    $sql = "SELECT * FROM `bus` WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}

function InsertDataBus($number, $busregis, $road, $depart)
{
    $sql = "INSERT INTO `bus` (`number`, `busregis`, `road`, `depart`) VALUES ('$number','$busregis','$road','$depart')";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function DeleteBus($id)
{
    $sql = "DELETE FROM `bus` WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function DeleteTicket($id)
{
    $sql = "DELETE FROM `ticket` WHERE `bus_id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function GetMaxBusId()
{
    $sql = "SELECT MAX(id) AS `max_id` FROM `bus`";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result['max_id'];
}

function InsertTicket($bus_id)
{
    for ($i = 1; $i <= 12; $i++) {
        $sql = "INSERT INTO `ticket`(`seats`, `time`, `bus_id`) VALUES ('A$i',current_timestamp,'$bus_id')";
        $query = $GLOBALS['conn']->query($sql);
    }
    for ($i = 1; $i <= 12; $i++) {
        $sql = "INSERT INTO `ticket`(`seats`, `time`, `bus_id`) VALUES ('B$i',current_timestamp,'$bus_id')";
        $query = $GLOBALS['conn']->query($sql);
    }
    for ($i = 1; $i <= 12; $i++) {
        $sql = "INSERT INTO `ticket`(`seats`, `time`, `bus_id`) VALUES ('C$i',current_timestamp,'$bus_id')";
        $query = $GLOBALS['conn']->query($sql);
    }

    return true;
}

if (isset($_GET['method']) && $_GET['method'] == "AddData") {
    require __DIR__ . "/../../config/define.php";

    $number = $_POST['number'];
    $busregis = $_POST['busregis'];
    $road = $_POST['road'];
    $depart = $_POST['depart'];

    $response = InsertDataBus($number, $busregis, $road, $depart);
    $id = GetMaxBusId();
    $response2 = InsertTicket($id);

    if (!$response && !$response2) {
?>
        <script>
            alert('เพิ่มรอบรถไม่สำเร็จ');
            window.location.replace("<?= BACKOFFICE_URL ?>admin_ticket.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('เพิ่มรอบรถเรียบร้อย');
            window.location.replace("<?= BACKOFFICE_URL ?>admin_ticket.php");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "DeleteData") {
    require __DIR__ . "/../../config/define.php";

    $bus_id = $_REQUEST['id'];

    $response = DeleteBus($bus_id);
    $response2 = DeleteTicket($bus_id);

    if (!$response && !$response2) {
    ?>
        <script>
            alert('ลบรอบรถไม่สำเร็จ');
            window.location.replace("<?= BACKOFFICE_URL ?>admin_ticket.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('ลบรอบรถเรียบร้อย');
           window.location.replace("<?= BACKOFFICE_URL ?>admin_ticket.php");
        </script>
<?php
    }
}
