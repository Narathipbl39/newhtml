<?php require __DIR__ . "/layout/header.php";
require __DIR__ . "/module/AppTicket.php";
require __DIR__ . "/module/AppBus.php";
require __DIR__ . "/module/AppCarall.php";
$id = $_REQUEST['id']; ?>
<!-- Banner -->
<section class="main-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="btn-group-vertical">
                    <?php foreach (Gettickert(1, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>
                <div class="btn-group-vertical mr-5">
                    <?php foreach (Gettickert(2, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>

                <div class="btn-group-vertical">
                    <?php foreach (Gettickert(3, $id) as $ticket) { ?>
                        <button type="button" onclick="buy_ticket('<?= $ticket['id'] ?>')" class="btn btn-<?= (($ticket['status'] == '1') ? 'danger' : 'success') ?>"><?= $ticket['seats'] ?></button>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3">
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
            <div class="col-lg-6"></div>
        </div>
    </div>
</section>

<?php require __DIR__ . "/layout/footer.php" ?>