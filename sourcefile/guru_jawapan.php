<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");

	$id_murid = $_POST["id_murid"];
	$sql = "delete from pelaksanaan_kuiz where id_murid = '$id_murid'";
	$result = mysqli_query($sambungan, $sql);
?>

<link rel="stylesheet" href="borang.css">

<div class="kandungan"> 
	<div id="berjaya" style="display: none;">
		<h3>MESSAGE</h3> 
		<h2 class="mesej">YES! Successfully Deleted</h2> 
	</div> 

	<div id="tidak" style="display: none;">
		<h3>MESSAGE</h3>
		<h2 class="mesej">Owhh NO! Failed to Delete</h2>
	</div>
</div>

<?php
if ( mysqli_affected_rows($sambungan) > 0)
	echo "<script>document.getElementById('berjaya').style.display='block';</script>";
else
	echo "<script>document.getElementById('tidak').style.display='block'; </script>";
?>
