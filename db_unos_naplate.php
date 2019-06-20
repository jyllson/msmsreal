<?php

include_once('db.inc.php');

$mesec_id=$_POST['mesec'];
$lok_fakturisano_postpaid=$_POST['lok_fakturisano_postpaid'];
$lok_naplaceno_m4=$_POST['lok_naplaceno_m4'];
$lok_naplaceno_m3=$_POST['lok_naplaceno_m3'];
$lok_naplaceno_m2=$_POST['lok_naplaceno_m2'];
$lok_naplaceno_m1=$_POST['lok_naplaceno_m1'];

$lipb_fakturisano_postpaid=$_POST['lipb_fakturisano_postpaid'];
$lipb_naplaceno_m4=$_POST['lipb_naplaceno_m4'];
$lipb_naplaceno_m3=$_POST['lipb_naplaceno_m3'];
$lipb_naplaceno_m2=$_POST['lipb_naplaceno_m2'];
$lipb_naplaceno_m1=$_POST['lipb_naplaceno_m1'];

$vip_lok_pop_sum=$_POST['vip_lok_pop_sum'];
$vip_lok_prp_sum=$_POST['vip_lok_prp_sum'];

$vip_lipb_pop_sum=$_POST['vip_lipb_pop_sum'];
$vip_lipb_prp_sum=$_POST['vip_lipb_prp_sum'];

$conn = getDBObracun();
$insert_query="INSERT INTO naplata (mesec_id,lok_fakturisano_postpaid,lok_naplaceno_m4,lok_naplaceno_m3,lok_naplaceno_m2,lok_naplaceno_m1,lipb_fakturisano_postpaid,lipb_naplaceno_m4,lipb_naplaceno_m3,lipb_naplaceno_m2,lipb_naplaceno_m1,vip_lok_pop_sum,vip_lok_prp_sum,vip_lipb_pop_sum,vip_lipb_prp_sum) VALUES ($mesec_id,$lok_fakturisano_postpaid,$lok_naplaceno_m4,$lok_naplaceno_m3,$lok_naplaceno_m2,$lok_naplaceno_m1,$lipb_fakturisano_postpaid,$lipb_naplaceno_m4,$lipb_naplaceno_m3,$lipb_naplaceno_m2,$lipb_naplaceno_m1,$vip_lok_pop_sum,$vip_lok_prp_sum,$vip_lipb_pop_sum,$vip_lipb_prp_sum)";
mysqli_query($conn, $insert_query);

header('Location: unos_naplate.php');