<?php
require __DIR__ . "/../config/database.php";
require __DIR__ . "/../config/define.php";
session_start();

function Login($username, $password)
{
    $sql = "SELECT `username`, `password`, `id`,`name`, `lastname` FROM `user` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
    $query = $GLOBALS['conn']->query($sql);

    if ($query->num_rows > 0) {
        $result = $query->fetch_assoc();
        return $result;
    } else {
        return false;
    }
}

if (isset($_GET['method']) && $_GET['method'] == "Login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $data_login = Login($username, $password);

    if (!$data_login) {
?>
        <script>
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');
            window.location.replace("<?= WEBSITE_URL ?>login/login.php");
        </script>

    <?php
    } else {
        $_SESSION['id'] = $data_login['id'];
        $_SESSION['name'] = $data_login['name'];
        $_SESSION['lastname'] = $data_login['lastname'];

    ?>
        <script>
            window.location.replace("<?= WEBSITE_URL ?>");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "Logout") {

    session_destroy();
    ?>
    <script>
        window.location.replace("<?= WEBSITE_URL ?>");
    </script>
<?php
}


function InsertData($username, $password, $name, $lastname, $idcard, $email, $phone)
{
    $sql = "INSERT INTO `user`(`username`, `password`, `name`, `lastname`, `idcard`, `email`, `phone`) VALUES ('$username','$password','$name','$lastname','$idcard','$email','$phone')";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function UpdateData($id, $password, $name, $lastname, $idcard, $email, $phone)
{
    $sql = "UPDATE `user` SET `password` = '$password', `name` = '$name', `lastname` = '$lastname',`idcard` = '$idcard',`email` = '$email', `phone` = '$phone' WHERE `id` = '$id'";
    $query = $GLOBALS['conn']->query($sql);
    if ($query) {
        return true;
    } else {
        return false;
    }
}
if (isset($_GET['method']) && $_GET['method'] == "AddData") {
    require __DIR__ . "../config/define.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $idcard = $_POST['idcard'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $response = InsertData($username, $password, $name, $lastname, $idcard, $email, $phone);

    if (!$response) {
?>
        <script>
            alert('สมัครสมาชิกไม่สำเร็จ');
            window.location.replace("<?= BACKOFFICE_URL ?>reusers.php");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('สมัครสมาชิกเรียบร้อย');
            window.location.replace("<?= BACKOFFICE_URL ?>reusers.php");
        </script>
    <?php
    }
}
if (isset($_GET['method']) && $_GET['method'] == "EditData") {
    require __DIR__ . "../config/define.php";

    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $idcard = $_POST['idcard'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $response = UpdateData($id, $password, $name, $lastname, $idcard, $email, $phone);

    if (!$response) {
    ?>
        <script>
            alert('แก้ไขรายการไม่สำเร็จ โปรดลองใหม่อีกครั้ง!');
            window.location.replace("<?= BACKOFFICE_URL ?>user_edit.php?id=" + "<?= $id ?>");
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('แก้ไขรายการเรียบร้อยแล้ว');
            window.location.replace("<?= BACKOFFICE_URL ?>user_edit.php?id=" + "<?= $id ?>");
        </script>
    <?php
    }
}