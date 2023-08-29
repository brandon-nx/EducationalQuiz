<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");

	$id_murid = $_POST["id_murid"];
	$nama_murid = $_POST["nama_murid"];
	$id_kelas = $_POST["id_kelas"];
	$password_murid = $_POST["password_murid"];
	$sql = "update murid set nama_murid = '$nama_murid', id_kelas = '$id_kelas', password_murid = '$password_murid' where id_murid = '$id_murid'";
	$result = mysqli_query($sambungan, $sql);
?>

<link rel="stylesheet" href="borang.css">

<div class="kandungan"> 
	<div id="berjaya" style="display: none;">
		<h3>MESSAGE</h3> 
		<h2 class="mesej">YES! Successfully Updated</h2> 
	</div> 

	<div id="tidak" style="display: none;">
		<h3>MESSAGE</h3>
		<h2 class="mesej">Owhh NO! Failed to Update</h2>
	</div>
</div>

<?php 
	if ($result == true)
	    echo "<script>document.getElementById('berjaya').style.display='block';</script>";
	else
		echo "<script>document.getElementById('tidak').style.display='block'; </script>";
?>