<?php

include_once('db.inc.php');
include_once('functions.php');

$naplate = getNaplate();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Realni obracun partnera</title>

	<style type="text/css">
		.naplata {
			width: 50px;
		}

		td.text-center {
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>Unos naplate</h1>
	<form method="POST" action="db_unos_naplate.php">
		<table>
			<tr>
				<th>Mesec</th>
				<th>Lok PP</th>
				<th>Lok -4</th>
				<th>Lok -3</th>
				<th>Lok -2</th>
				<th>Lok -1</th>
				<th>Lok DB</th>
				<th>LiPB PP</th>
				<th>LiPB -4</th>
				<th>LiPB -3</th>
				<th>LiPB -2</th>
				<th>LiPB -1</th>
				<th>LiPB DB</th>
				<th>VIP Lok PoP</th>
				<th>VIP Lok PrP</th>
				<th>VIP Lok DB</th>
				<th>VIP LiPB PoP</th>
				<th>VIP LiPB PrP</th>
				<th>VIP LiPB DB</th>
			</tr>
			<?php foreach($naplate as $naplata): ?>
				<tr>
					<td class="text-center"><?php echo $naplata->mesec_id; ?></td>
					<td class="text-center"><?php echo $naplata->lok_fakturisano_postpaid; ?></td>
					<td class="text-center"><?php echo $naplata->lok_naplaceno_m4; ?></td>
					<td class="text-center"><?php echo $naplata->lok_naplaceno_m3; ?></td>
					<td class="text-center"><?php echo $naplata->lok_naplaceno_m2; ?></td>
					<td class="text-center"><?php echo $naplata->lok_naplaceno_m1; ?></td>
					<td class="text-center"><?php echo $naplata->lok_baza; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_fakturisano_postpaid; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_naplaceno_m4; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_naplaceno_m3; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_naplaceno_m2; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_naplaceno_m1; ?></td>
					<td class="text-center"><?php echo $naplata->lipb_baza; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lok_pop_sum; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lok_prp_sum; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lok_baza; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lipb_pop_sum; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lipb_prp_sum; ?></td>
					<td class="text-center"><?php echo $naplata->vip_lipb_baza; ?></td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td><?php echo getMonthsSelect(); ?></td>
				<td><input class="naplata" type="value" name="lok_fakturisano_postpaid"></td>
				<td><input class="naplata" type="value" name="lok_naplaceno_m4"></td>
				<td><input class="naplata" type="value" name="lok_naplaceno_m3"></td>
				<td><input class="naplata" type="value" name="lok_naplaceno_m2"></td>
				<td><input class="naplata" type="value" name="lok_naplaceno_m1"></td>
				<td></td>
				<td><input class="naplata" type="value" name="lipb_fakturisano_postpaid"></td>
				<td><input class="naplata" type="value" name="lipb_naplaceno_m4"></td>
				<td><input class="naplata" type="value" name="lipb_naplaceno_m3"></td>
				<td><input class="naplata" type="value" name="lipb_naplaceno_m2"></td>
				<td><input class="naplata" type="value" name="lipb_naplaceno_m1"></td>
				<td></td>
				<td><input class="naplata" type="value" name="vip_lok_pop_sum"></td>
				<td><input class="naplata" type="value" name="vip_lok_prp_sum"></td>
				<td></td>
				<td><input class="naplata" type="value" name="vip_lipb_pop_sum"></td>
				<td><input class="naplata" type="value" name="vip_lipb_prp_sum"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<input type="submit" value="Unesi naplatu">
			</tr>		
		</table>
	</form>
</body>
</html>