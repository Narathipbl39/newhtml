<?php require __DIR__ . "/layout/header.php"; ?>
<?php require __DIR__ . "/module/AppUsers.php";
$id = $_REQUEST['id'];
?>
<div class="inner">
    <!-- Forms -->
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>แก้ไขข้อมูลผู้ใช้</h2>
                    </div>
                    <form id="contact" action="<?= BACKOFFICE_URL ?>module/AppUsers.php?method=EditData" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="username">ชื่อผู้ใช้</label>
                                    <input name="username" type="text" class="form-control" id="" placeholder="ชื่อผู้ใช้" required="" value="<?= GetusersById($id)['username'] ?>" disabled>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="password">รหัสผ่าน</label>
                                    <input name="password" type="text" class="form-control" id="" placeholder="รหัสผ่าน" required="" value="<?= GetusersById($id)['password'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="name">ชื่อ</label>
                                    <input name="name" type="text" class="form-control" id="" placeholder="ชื่อ" required="" value="<?= GetusersById($id)['name'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="lastname">นามสกุล</label>
                                    <input name="lastname" type="text" class="form-control" id="" placeholder="นามสกุล" required="" value="<?= GetusersById($id)['lastname'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="idcard">หมายเลขบัตรประชาชน</label>
                                    <input name="idcard" type="text" class="form-control" id="" placeholder="หมายเลขบัตรประชาชน" required="" value="<?= GetusersById($id)['idcard'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="email">อีเมล์</label>
                                    <input name="email" type="text" class="form-control" id="" placeholder="อีเมล์" required="" value="<?= GetusersById($id)['email'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="phone">เบอร์โทรติดต่อ</label>
                                    <input name="phone" type="text" class="form-control" id="" placeholder="เบอร์โทรติดต่อ" required="" value="<?= GetusersById($id)['phone'] ?>">
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