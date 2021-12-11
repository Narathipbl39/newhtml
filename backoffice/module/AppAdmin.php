<?php  
require __DIR__ . "/../../config/database.php";

function Login($username, $password)
{
    $sql = "SELECT `username`, `password`, `id`,'status' FROM `admin` WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";
    $query = $GLOBALS['conn']->query($sql);

    if ($query->num_rows > 0) {
        $result = $query->fetch_assoc();
        return $result;
    } else {
        return false;
    }
}

if (isset($_GET['method']) && $_GET['method'] == "Login") {
    require __DIR__ . "/../../config/define.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $data_login = Login($username, $password);

    if (!$data_login) {
?>
        <script>
            alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');
            window.location.replace("<?= BACKOFFICE_URL ?>login/form.php");
        </script>

    <?php
    } else {
        $_SESSION['id'] = $data_login['id'];

    ?>
        <script>
            window.location.replace("<?= BACKOFFICE_URL ?>index.php");
        </script>
    <?php
    }
}

if (isset($_GET['method']) && $_GET['method'] == "Logout") {
    require __DIR__ . "/../../config/define.php";
    session_start();
    session_destroy();
    ?>
    <script>
        window.location.replace("<?= BACKOFFICE_URL ?>/login/form.php");
    </script>
<?php
}
