<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppUsers.php" ?>
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>ผู้ใช้ทั้งหมด</h2>
                </div>
                <div class="default-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Getusers() as $index => $Users) { ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $Users['name'] . ' ' . $Users['lastname'] ?></td>
                                    <td>
                                        <button onclick="Edit('<?= $Users['id'] ?>')" style="background-color: #FF8C2D;" class="border-button">แก้ไข</button>
                                        <button onclick="Delete('<?= $Users['id'] ?>')" style="background-color: #FB2222;" class="border-button">ลบ</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button><a href="<?=BACKOFFICE_URL?>reusers.php" class="border-button">เพิ่มผู้ใช้งาน</a></button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function Edit(id) {
        window.location.replace("<?= BACKOFFICE_URL ?>user_edit.php?id=" + id);
    }

    function Delete(id) {
        if (confirm("ยืนยันการดำเนินการ!")) {
            window.location.replace("<?= BACKOFFICE_URL ?>module/AppUsers.php?method=DeleteData&id=" + id);
        }
    }
</script>
<?php require __DIR__ . "/layout/footer.php" ?>