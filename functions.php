<?php

function getMonthsSelect(){
	$conn = getDBObracun();
	$q = "SELECT * FROM meseci";
	$res = mysqli_query($conn, $q);
	$select = "<select name='mesec'>";
	$select .= "<option selected disabled>Izaberi mesec -></option>";
	while($row = mysqli_fetch_object($res)){
		$select .= "<option value='$row->id'>$row->naziv</option>";
	}
	$select .= "</select>";
	return $select;
}

function getNaplate(){
	$conn = getDBObracun();
	$q = "SELECT * FROM (SELECT * FROM naplata ORDER BY id DESC LIMIT 5) sub ORDER BY id ASC";
	$res = mysqli_query($conn, $q);

	while($row = mysqli_fetch_object($res)){
		$naplata[] = $row;
	}
	return $naplata;
}

function getNaplateAll(){
	$conn = getDBObracun();
	$q = "SELECT * FROM naplata";
	$res = mysqli_query($conn, $q);

	while($row = mysqli_fetch_object($res)){
		$naplata[] = $row;
	}
	return $naplata;
}

function getMeseci(){
	$conn = getDBObracun();
	$q = "SELECT * FROM meseci";
	$res = mysqli_query($conn, $q);

	while($row = mysqli_fetch_object($res)){
		$meseci[] = $row;
	}
	return $meseci;
}

function getMesecFromId($mesec){
	$conn = getDBObracun();
	$q = "SELECT naziv FROM meseci where id='{$mesec}'";
	$res = mysqli_query($conn, $q);

	while($row = mysqli_fetch_object($res)){
		$mesec_name = $row->naziv;
	}
	return $mesec_name;
}

function getPotrosnja($mesec, $userfield){
	$conn = getDBAsterisk();
	$q = "SELECT SUM(`billsec`)/60 AS potrosnja FROM `cdr` WHERE `calldate` LIKE '{$mesec}%' AND `userfield` = '{$userfield}'";
	$res = mysqli_query($conn, $q);
	while($row = mysqli_fetch_object($res)){
		$potrosnja = $row;
	}
	return $potrosnja;
}