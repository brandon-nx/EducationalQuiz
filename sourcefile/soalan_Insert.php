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

	$sql = "insert into soalan values('$id_soalan', '$nama_soalan', '$pilihan_A', '$pilihan_B', '$pilihan_C', '$pilihan_D', '$jawapan', '$markah', '$id_guru', '$id_kuiz', '$jenis')";
	
	$result = mysqli_query($sambungan, $sql);
?>

<link rel="stylesheet" href="borang.css">

<div class="kandungan"> 
	<div id="berjaya" style="display: none;">
		<h3>MESSAGE</h3> 
		<h2 class="mesej">YES! Successfully Added</h2> 
	</div> 

	<div id="tidak" style="display: none;">
		<h3>MESSAGE</h3>
		<h2 class="mesej">Owhh NO! Failed to Add</h2>
	</div>
</div>

<?php 
	if ($result == true)
	    echo "<script>document.getElementById('berjaya').style.display='block';</script>";
	else
		echo "<script>document.getElementById('tidak').style.display='block'; </script>";
?>