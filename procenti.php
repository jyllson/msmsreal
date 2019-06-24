<?php

include_once('db.inc.php');
include_once('functions.php');

$naplate = getNaplateAll();

foreach ($naplate as $key => $naplata) {
	// Naplata Telekom
	$fakturisano_lokali = $naplata->lok_fakturisano_postpaid;
	$naplaceno_lokali = $naplate[$key+1]->lok_naplaceno_m1;
	$naplaceno_lokali += $naplate[$key+2]->lok_naplaceno_m2;
	$naplaceno_lokali += $naplate[$key+3]->lok_naplaceno_m3;
	$naplaceno_lokali += $naplate[$key+4]->lok_naplaceno_m4;
	$procenat_lokali = number_format($naplaceno_lokali * 100 / $fakturisano_lokali,2);
	echo "Procenat naplate lokala Telekom za " . getMesecFromId($naplata->mesec_id) . ": " . $procenat_lokali . "%<br>";

	// Naplata VIP
	$minutaza_vip_lokali = $naplata->vip_lok_baza;
	$naplaceno_vip_lokali = number_format(($naplata->vip_lok_pop_sum + $naplata->vip_lok_prp_sum)/60,2);
	$minutaza_vip_lipb = $naplata->vip_lipb_baza;
	$naplaceno_vip_lipb = number_format(($naplata->vip_lipb_pop_sum + $naplata->vip_lipb_prp_sum)/60,2);
	$procenat_vip_lokali = number_format($naplaceno_vip_lokali * 100 / $minutaza_vip_lokali,2);
	$procenat_vip_lipb = number_format($naplaceno_vip_lipb * 100 / $minutaza_vip_lipb,2);
	echo "Procenat naplate lokala VIP za " . getMesecFromId($naplata->mesec_id) . ": " . $procenat_vip_lokali . "%<br>";

	// Procenti naplate
	$minutaza_telekom_lokali - $naplata->lok_baza;
	$minutaza_vip_lokali = $naplata->vip_lok_baza;
	$minutaza_telekom_lipb = $naplata->lipb_baza;
	$minutaza_vip_lipb = $naplata->vip_lipb_baza;
	$udeo_telekom_lokali = number_format($minutaza_telekom_lokali * 100 / ($minutaza_telekom_lokali + $minutaza_vip_lokali),2);
	$udeo_vip_lokali = number_format($minutaza_vip_lokali * 100 / ($minutaza_telekom_lokali + $minutaza_vip_lokali),2);
	$udeo_telekom_lipb = number_format($minutaza_telekom_lipb * 100 / ($minutaza_telekom_lipb + $minutaza_vip_lipb),2);
	$udeo_vip_lipb = number_format($minutaza_vip_lipb * 100 / ($minutaza_telekom_lipb + $minutaza_vip_lipb),2);
	echo "Udeo Telekom Lokali za " . getMesecFromId($naplata->mesec_id) . ": " . $udeo_telekom_lokali . "<br>";
	echo "Udeo VIP Lokali za " . getMesecFromId($naplata->mesec_id) . ": " . $udeo_vip_lokali . "<br>";
	echo "Udeo Telekom LiPB za " . getMesecFromId($naplata->mesec_id) . ": " . $udeo_telekom_lipb . "<br>";
	echo "Udeo VIP LiPB za " . getMesecFromId($naplata->mesec_id) . ": " . $udeo_vip_lipb . "<br>";
	echo "<hr>";
}