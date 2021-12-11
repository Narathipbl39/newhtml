<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppCarall.php"; ?>
<?php require __DIR__ . "/module/AppBus.php"; ?>
<div class="inner">
    <!-- Forms -->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>เพิ่มพนักงานขับรถ</h2>
                    </div>
                    <form id="contact" action="<?= BACKOFFICE_URL ?>module/AppCarall.php?method=AddData" method="post" enctype="multipart/form-data">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                    <center>
                                        <img id="blah" src="<?= BACKOFFICE_URL . 'img/img_old.png' ?>" style="width: 50%;">
                                    </center>
                                    <input class="mt-3" type='file' id="imgInp" name="file">
                                    <input type="hidden" name="img_old" id="img_old" value="">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>

                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                            $("#imgInp").change(function() {
                                readURL(this);
                            });
                        </script>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="drusername">ชื่อผู้ใช้</label>
                                    <input name="drusername" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="drpassword">รหัสผ่าน</label>
                                    <input name="drpassword" type="text" class="form-control" id="" placeholder="รหัสผ่าน" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="drname">ชื่อ</label>
                                    <input name="drname" type="text" class="form-control" id="" placeholder="ชื่อ" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="drlastname">นามสกุล</label>
                                    <input name="drlastname" type="text" class="form-control" id="" placeholder="นามสกุล" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="drphone">เบอร์โทรศัพท์</label>
                                    <input name="drphone" type="text" class="form-control" id="" placeholder="เบอร์โทรศัพท์" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="idcard">หมายเลขบัตรประชาชน</label>
                                    <input name="idcard" type="text" class="form-control" id="" placeholder="หมายเลขบัตรประชาชน" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="license">หมายเลขใบขับขี่</label>
                                    <input name="license" type="text" class="form-control" id="" placeholder="ทะเบียนรถ" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="license">รถที่ต้องการลงทะเบียน</label>
                                    <select name="busregis" id="busregis">
                                        <option value="-1" selected>โปรดเลือก</option>
                                        <?php foreach (GetBusAll() as $Bus) { ?>
                                            <option value="<?= $Bus['id'] ?>"><?= $Bus['busregis'] ?></option>
                                        <?php } ?>
                                    </select>
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