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