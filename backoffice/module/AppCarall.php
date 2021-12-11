<?php
require __DIR__ . "/../../config/database.php";

function GetCarall()
{

    $response = array();

    $sql = "SELECT * FROM `driver` ";
    $query = $GLOBALS['conn']->query($sql);

    while ($result = $query->fetch_assoc()) {
        $response[] = $result;
    }
    return $response;
}

function GetCarallById($id)
{
    $sql = "SELECT * FROM `driver` WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result;
}

function GetIdDriver($idcard)
{
    $sql = "SELECT `id` FROM `driver` WHERE `idcard` = '$idcard'";
    $query = $GLOBALS['conn']->query($sql);

    $result = $query->fetch_assoc();
    return $result['id'];
}

function UpdateBusDriverId($driver_id, $id)
{
    $sql = "UPDATE `bus` SET `driver_id`= '' WHERE `driver_id` = '$driver_id'";
    $query = $GLOBALS['conn']->query($sql);

    $sql1 = "UPDATE `bus` SET `driver_id`= '$driver_id' WHERE `id` = '$id'";
    $query1 = $GLOBALS['conn']->query($sql1);
    if ($query && $query1) {
        return true;
    } else {
        return false;
    }
}

function InsertData($drusername, $drpassword, $drname, $drlastname, $drphone, $idcard, $license, $imgup)
{
    $sql = "INSERT INTO `driver`(`drusername`, `drpassword`, `drname`, `drlastname`,`drphone`,`idcard`,`license`,`image_path`) VALUES ('$drusername','$drpassword','$drname','$drlastname','$drphone','$idcard','$license','$imgup')";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function UpdateData($id, $drpassword, $drname, $drlastname, $drphone, $idcard, $license, $imgup)
{
    $sql = "UPDATE `driver` SET `drpassword` = '$drpassword', `drname` = '$drname', `drlastname` = '$drlastname',`drphone` = '$drphone', `idcard` = '$idcard', `license` = '$license',`image_path` = '$imgup' WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function DeleteData($id)
{
    $sql = "DELETE FROM `driver` WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

if (isset($_GET['method']) && $_GET['method'] == "AddData") {
    require __DIR__ . "/../../config/define.php";

    $imgup = $_FILES['file']['name'];
    if ($imgup != "") {
        $target_dir = "../img/driver/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $imgup);
        }
    } else {
        $imgup = $_POST['img_old'];
    }

    $drusername = $_POST['drusername'];
    $drpassword = $_POST['drpassword'];
    $drname = $_POST['drname'];
    $drlastname = $_POST['drlastname'];
    $drphone = $_POST['drphone'];
    $idcard = $_POST['idcard'];
    $license = $_POST['license'];
    $busregis_id = $_POST['busregis'];

    $response = InsertData($drusername, $drpassword, $drname, $drlastname, $drphone, $idcard, $license, $imgup);
    $id = GetIdDriver($idcard);
    $response2 = UpdateBusDriverId($id, $busregis_id);

    if (!$response && !$response2) {
?>
        <script>
            alert('เพิ่มรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= BACKOFFICE_URL ?>carall.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('เพิ่มรายการเรียบร้อยแล้ว');
            window.location.replace("<?= BACKOFFICE_URL ?>carall.php");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "EditData") {
    require __DIR__ . "/../../config/define.php";

    $imgup = $_FILES['file']['name'];
    if ($imgup != "") {
        $target_dir = "../img/driver/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {
            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $imgup);
        }
    } else {
        $imgup = $_POST['img_old'];
    }


    $id = $_POST['id'];
    $drpassword = $_POST['drpassword'];
    $drname = $_POST['drname'];
    $drlastname = $_POST['drlastname'];
    $drphone = $_POST['drphone'];
    $idcard = $_POST['idcard'];
    $license = $_POST['license'];
    $busregis_id = $_POST['busregis'];

    $response = UpdateData($id, $drpassword, $drname, $drlastname, $drphone, $idcard, $license, $imgup);
    $response2 = UpdateBusDriverId($id, $busregis_id);


    if (!$response && !$response2) {
    ?>
        <script>
            alert('แก้ไขรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= BACKOFFICE_URL ?>car_edit.php?id=" + "<?= $id ?>");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('แก้ไขรายการเรียบร้อยแล้ว');
            window.location.replace("<?= BACKOFFICE_URL ?>car_edit.php?id=" + "<?= $id ?>");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "DeleteData") {
    require __DIR__ . "/../../config/define.php";

    $id = $_REQUEST['id'];

    $response = DeleteData($id);

    if (!$response) {
    ?>
        <script>
            alert('ลบรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= BACKOFFICE_URL ?>carall.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('ลบรายการเรียบร้อยแล้ว');
            window.location.replace("<?= BACKOFFICE_URL ?>carall.php");
        </script>
<?php
    }
}
