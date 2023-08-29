<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");

	$id_kuiz = $_POST["id_kuiz"];
	$nama_kuiz = $_POST["nama_kuiz"];
	$sql = "update kuiz set nama_kuiz = '$nama_kuiz' where id_kuiz = '$id_kuiz'";
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