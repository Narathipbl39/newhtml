<?php require __DIR__ . "/layout/header.php";
require __DIR__ . "/module/AppBus.php";
require __DIR__ . "/module/AppTicket.php";
$id = $_REQUEST['id']; ?>
<?php if (isset($_SESSION['id'])) { ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="btn-group-vertical">
                    <?php foreach (Gettickert(1, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>
                <div class="btn-group-vertical">
                    <?php foreach (Gettickert(2, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>
            </div>
            <div class="col">
                <div class="btn-group-vertical">
                    <?php foreach (Gettickert(3, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>
            </div>
            <div class="col">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <fieldset>
                            <label for="drusername">ชื่อ</label>
                            <input name="drusername" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" disabled required="" value="<?= ((GetBusById($id)['driver_id'] == '0') ? 'ยังไม่มีคนขับ' : GetCarallById(GetBusById($id)['driver_id'])['drname'] . ' ' . GetCarallById(GetBusById($id)['driver_id'])['drlastname'])  ?>">
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <label for="drpassword">เบอร์โทรศัพท์</label>
                            <input name="drpassword" type="text" class="form-control" id="" placeholder="รหัสผ่าน" disabled required="" value="<?= ((GetBusById($id)['driver_id'] == '0') ? 'ยังไม่มีคนขับ' : GetCarallById(GetBusById($id)['driver_id'])['drphone']) ?>">
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <label for="drpassword">หมายเลขรถ</label>
                            <input name="drpassword" type="text" class="form-control" id="" placeholder="รหัสผ่าน" disabled required="" value="<?= GetBusById($id)['number'] ?>">
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <fieldset>
                            <label for="drpassword">เส้นทาง</label>
                            <input name="drpassword" type="text" class="form-control" id="" placeholder="รหัสผ่าน" disabled required="" value="<?= GetBusById($id)['road'] ?>">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function buy_ticket(id) {
            window.location.replace('<?= WEBSITE_URL ?>buy-confirm.php?id=' + id + '&bus_id=' + <?= $id ?>);
        }
    </script>

    <?php require __DIR__ . "/layout/footer.php" ?>
<?php } else {
    header("location:" . WEBSITE_URL . "login/login.php");
} ?>