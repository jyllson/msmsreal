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
			font-size: 12px;
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
					<td class="text-center"><?php echo number_format($naplata->lok_fakturisano_postpaid,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lok_naplaceno_m4,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lok_naplaceno_m3,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lok_naplaceno_m2,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lok_naplaceno_m1,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lok_baza,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_fakturisano_postpaid,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_naplaceno_m4,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_naplaceno_m3,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_naplaceno_m2,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_naplaceno_m1,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->lipb_baza,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lok_pop_sum,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lok_prp_sum,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lok_baza,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lipb_pop_sum,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lipb_prp_sum,2); ?></td>
					<td class="text-center"><?php echo number_format($naplata->vip_lipb_baza,2); ?></td>
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
	<h2>Legenda</h2>
	<hr>
	<p><strong>LokPP</strong> - Fakturisan iznos za lokale u mesecu, postpaid, bruto</p>
	<p><strong>Lok -4 do Lok -1</strong> - Naplaceni iznosi u mesecu</p>
	<hr>
	<p><strong>LiPB PP</strong> - Fakturisan iznos za LiPB u mesecu, postpaid, bruto</p>
	<p><strong>LiPB -4 do LiPB -1</strong> - Naplaceno iznosi u LiPB u mesecu</p>
	<hr>
	<p><strong>VIP Lok PoP i PrP</strong> - gornja i donja cifra iz izvestaja za lokale</p>
	<p><strong>VIP LiPB PoP i PrP</strong> - gornja i donja cifra iz izvestaja za LiPB</p>
</body>
</html>