<?php require __DIR__ . "/layout/header.php" ?>
<?php require __DIR__ . "/module/AppBus.php" ?>
<?php if (isset($_SESSION['id'])) { ?>


	<table class="table">
		<thead class="table-dark">
			<tr>
				<th scope="col">ลำดับ</th>
				<th scope="col">เส้นทาง</th>
				<th scope="col">เวลาออกรถ</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach (GetBusAll() as $index => $Bus) { ?>
				<tr>
					<th scope="row"><?= $index + 1 ?></th>
					<td><?= $Bus['road'] ?></td>
					<td><?= $Bus['depart'] ?></td>
					<td>
						<button type="button" onclick="buy('<?= $Bus['id'] ?>')" class="btn btn-success">ซื้อตั๋ว</button>
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