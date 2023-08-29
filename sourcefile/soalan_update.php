<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");

	$id_soalan = $_POST["id_soalan"];
	$nama_soalan = $_POST["nama_soalan"];
	$pilihan_A = $_POST["pilihan_A"];
	$pilihan_B = $_POST["pilihan_B"];
	$pilihan_C = $_POST["pilihan_C"];
	$pilihan_D = $_POST["pilihan_D"];
	$jawapan = $_POST["jawapan"];
	$markah = $_POST["markah"];
	$id_guru = $_POST["id_guru"];
	$id_kuiz = $_POST["id_kuiz"];
	$jenis = $_POST["jenis"];


	$sql = "update soalan set nama_soalan = '$nama_soalan', pilihan_A = '$pilihan_A', pilihan_B = '$pilihan_B', pilihan_C = '$pilihan_C', pilihan_D = '$pilihan_D', jawapan = '$jawapan', markah = '$markah', id_guru = '$id_guru', id_kuiz = '$id_kuiz', jenis = '$jenis' where id_soalan = '$id_soalan' ";
	
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