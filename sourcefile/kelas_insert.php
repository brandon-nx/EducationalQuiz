<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");

	$id_kelas = $_POST["id_kelas"];
	$nama_kelas = $_POST["nama_kelas"];
	$sql = "insert into kelas values('$id_kelas', '$nama_kelas')";
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