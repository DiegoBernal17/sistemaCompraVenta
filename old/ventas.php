<?php
require_once("ini.php");
require_once("models/Ventas.php");
$ventas = new Ventas();
require_once("template/header.php");
 ?>
	<div id="box">
		<table>
			<?php while($row = mysqli_fetch_array($ventas->toList())) { ?>
			<tr>
				<td>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
<?php require_once("template/footer.php"); ?>
