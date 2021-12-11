<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppBus.php" ?>
<!-- Tables -->
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>รอบรถทั้งหมด</h2>
                </div>
                <div class="default-table">
                    <table>
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>เส้นทาง</th>
                                <th>เวลาออกรถ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (GetBusAll() as $index => $Bus) { ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $Bus['road'] ?></td>
                                    <td><?= $Bus['depart'] ?></td>
                                    <td>
                                        <button onclick="Edit('<?= $Bus['id'] ?>')" style="background-color: #FF8C2D;" class="border-button">ตั๋ว</button>
                                        <button onclick="Delete('<?= $Bus['id'] ?>')" style="background-color: 	#FF6347;" class="border-button">ลบ</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button><a href="<?= BACKOFFICE_URL ?>add_bus.php" class="border-button">เพิ่มรอบรถ</a></button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function Edit(id) {
        window.location.replace("<?= BACKOFFICE_URL ?>ticket.php?id=" + id);
    }

    function Delete(id) {
        if (confirm('ยืนยันการลบ!')) {
            window.location.replace("<?= BACKOFFICE_URL ?>module/AppBus.php?method=DeleteData&id=" + id);
        }
    }
</script>
<?php require __DIR__ . "/layout/footer.php" ?>