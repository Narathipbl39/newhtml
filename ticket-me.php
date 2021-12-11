<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppBus.php" ?>
<?php require __DIR__ . "/module/AppTicket.php" ?>
<?php if (isset($_SESSION['id'])) { ?>


    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">เส้นทาง</th>
                <th scope="col">เลขที่นั่ง</th>
                <th scope="col">เวลาออกรถ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (GetticketMe($_SESSION['id']) as $index => $Me) { ?>
                <tr>
                    <th scope="row"><?= $index + 1 ?></th>
                    <td><?= GetBusById(GetticketById($Me['ticket_id'])['bus_id'])['road'] ?></td>
                    <td><?= GetticketById($Me['ticket_id'])['seats'] ?></td>
                    <td>
                        <?= $Me['date_time'] ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        function buy(id) {
            window.location.replace('<?= WEBSITE_URL ?>buy-ticket.php?id=' + id);
        }
    </script>
    <?php require __DIR__ . "/layout/footer.php" ?>
<?php } else {
    header("location:" . WEBSITE_URL . "login/login.php");
} ?>