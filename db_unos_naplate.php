<?php

include_once('db.inc.php');
include_once('functions.php');

$telekom_lok = '381212155899';
$telekom_lipb = '381212155908';
$vip_lok = '381906444808';
$vip_lipb = '381906202124';

$mesec_id=$_POST['mesec'];
$mesec_db = substr($mesec_id, 0,4) . "-" . substr($mesec_id, 4,2);
$lok_fakturisano_postpaid=$_POST['lok_fakturisano_postpaid'];
$lok_naplaceno_m4=$_POST['lok_naplaceno_m4'];
$lok_naplaceno_m3=$_POST['lok_naplaceno_m3'];
$lok_naplaceno_m2=$_POST['lok_naplaceno_m2'];
$lok_naplaceno_m1=$_POST['lok_naplaceno_m1'];
$lok_baza= isset(getPotrosnja($mesec_db,$telekom_lok)->potrosnja)?getPotrosnja($mesec_db,$telekom_lok)->potrosnja:0;
$lipb_fakturisano_postpaid=$_POST['lipb_fakturisano_postpaid'];
$lipb_naplaceno_m4=$_POST['lipb_naplaceno_m4'];
$lipb_naplaceno_m3=$_POST['lipb_naplaceno_m3'];
$lipb_naplaceno_m2=$_POST['lipb_naplaceno_m2'];
$lipb_naplaceno_m1=$_POST['lipb_naplaceno_m1'];
$lipb_baza=isset(getPotrosnja($mesec_db,$telekom_lipb)->potrosnja)?getPotrosnja($mesec_db,$telekom_lipb)->potrosnja:0;
$vip_lok_pop_sum=$_POST['vip_lok_pop_sum'];
$vip_lok_prp_sum=$_POST['vip_lok_prp_sum'];
$vip_lok_baza=isset(getPotrosnja($mesec_db,$vip_lok)->potrosnja)?getPotrosnja($mesec_db,$vip_lok)->potrosnja:0;
$vip_lipb_pop_sum=$_POST['vip_lipb_pop_sum'];
$vip_lipb_prp_sum=$_POST['vip_lipb_prp_sum'];
$vip_lipb_baza=isset(getPotrosnja($mesec_db,$vip_lipb)->potrosnja)?getPotrosnja($mesec_db,$vip_lipb)->potrosnja:0;
$conn = getDBObracun();
$insert_query="INSERT INTO naplata (mesec_id,lok_fakturisano_postpaid,lok_naplaceno_m4,lok_naplaceno_m3,lok_naplaceno_m2,lok_naplaceno_m1,lok_baza,lipb_fakturisano_postpaid,lipb_naplaceno_m4,lipb_naplaceno_m3,lipb_naplaceno_m2,lipb_naplaceno_m1,lipb_baza,vip_lok_pop_sum,vip_lok_prp_sum,vip_lok_baza,vip_lipb_pop_sum,vip_lipb_prp_sum,vip_lipb_baza) VALUES ($mesec_id,$lok_fakturisano_postpaid,$lok_naplaceno_m4,$lok_naplaceno_m3,$lok_naplaceno_m2,$lok_naplaceno_m1,$lok_baza,$lipb_fakturisano_postpaid,$lipb_naplaceno_m4,$lipb_naplaceno_m3,$lipb_naplaceno_m2,$lipb_naplaceno_m1,$lipb_baza,$vip_lok_pop_sum,$vip_lok_prp_sum,$vip_lok_baza,$vip_lipb_pop_sum,$vip_lipb_prp_sum,$vip_lipb_baza)";
mysqli_query($conn, $insert_query);
$lok_baza."<br>";
$lipb_baza."<br>";
$vip_lok_baza."<br>";
$vip_lipb_baza."<br>";
echo "<hr>";
echo $insert_query;
header('Location: unos_naplate.php');