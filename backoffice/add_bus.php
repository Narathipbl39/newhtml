<?php require __DIR__ . "/layout/header.php"; ?>
<?php require __DIR__ . "/module/AppBus.php";
?>
<div class="inner">
    <!-- Forms -->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>เพิ่มรอบรถ</h2>
                    </div>
                    <form id="contact" action="<?= BACKOFFICE_URL ?>module/AppBus.php?method=AddData" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="number">หมายเลขรถ</label>
                                    <input name="number" type="text" class="form-control" id="" placeholder="หมายเลขรถ" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="busregis">เลขทะเบียน</label>
                                    <input name="busregis" type="text" class="form-control" id="" placeholder="เลขทะเบียน" required=""
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="road">เส้นทาง</label>
                                    <input name="road" type="text" class="form-control" id="" placeholder="เส้นทาง" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="depart">เวลาออกรถ</label>
                                    <input name="depart" type="text" class="form-control" id="" placeholder="เวลาออกรถ" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="id" value="<?= $id ?>" id="form-submit" class="button">ยืนยัน</button>
                                <button type="reset" id="form-submit" class="button">รีเซ็ต</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require __DIR__ . "/layout/footer.php" ?>