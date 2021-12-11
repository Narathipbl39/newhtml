<?php require __DIR__ . "/layout/header.php";
require __DIR__ . "/module/AppBus.php";
require __DIR__ . "/module/AppTicket.php";
$id = $_REQUEST['id'];
$bus_id = $_REQUEST['bus_id']; ?>
<?php if (isset($_SESSION['id'])) { ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <form action="<?= WEBSITE_URL ?>module/AppTicket.php?method=AddData" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">เส้นทาง: </label>
                        <label for="exampleInputEmail1" class="form-label"><b><?= GetBusById($bus_id)['road'] ?></b></label>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">หมายเลขที่นั่ง: </label>
                        <label for="exampleInputEmail1" class="form-label"><b><?= GetticketById($id)['seats'] ?></b></label>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ราคารวม: </label>
                        <label for="exampleInputEmail1" class="form-label"><b>150 บาท</b></label>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">วันที่</label>
                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">เวลา</label>
                        <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="hidden" name="ticket_id" value="<?= $id ?>">
                    <button type="submit" name="users_id" value="<?= $_SESSION['id'] ?>" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-2">

            </div>
        </div>
    </div>

    <?php require __DIR__ . "/layout/footer.php" ?>
<?php } else {
    header("location:" . WEBSITE_URL . "login/login.php");
} ?>