<?php

include("clases/util.class.php");

function get_sector()
{
	$otables = new tables();						
	return $otables->get_sector();
}

function ls_soc_idsec($id_sector)
{
	$otables = new tables();
	$otables -> setId_sector($id_sector);
	return $otables->get_socios_idsector2();
}

function ls_soc_orsec($id_sector)
{
	$otables = new tables();
	$otables -> setId_sector($id_sector);
	return $otables->get_socios_idsector();
}

function ls_soc_liksec($id_sector)
{
	$otables = new tables();
	$otables -> setId_sector($id_sector);
	return $otables->get_socios_liksector();
}

function ls_datosec()
{
	$otables = new tables();
	return $otables->get_datosec();
}

function ls_datosec2($id_dsec)
{
	$otables = new tables();
	$otables -> setId_ds($id_dsec);
	return $otables->get_datosec2();
}





?>