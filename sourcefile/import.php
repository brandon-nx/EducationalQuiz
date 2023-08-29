<?php
	include('keselamatan.php');
	include('header.php');
	include('menu_guru.php');
	include('sambungan.php');

	$namajadual = $_POST['namatable'];
	$namafail = $_FILES['namafail']['name'];

	$fail = fopen($namafail, "r");
	while (!feof($fail)){
		$medan = explode(",",fgets($fail));
		if($namajadual === "Students"){
		    $id_murid = $medan[0];
		    $nama_murid = $medan[1];
		    $id_kelas = $medan[2];	  
		    $password_murid = $medan[3];
		    $sql = "insert into murid values('$id_murid','$nama_murid','$id_kelas','$password_murid')";
			$result = mysqli_query($sambungan, $sql);
		}
		if($namajadual === "Questions"){
		    $id_soalan = $medan[0];
		    $nama_soalan = $medan[1];
		    $pilihan_A = $medan[2];
		    $pilihan_B = $medan[3];
		    $pilihan_C  = $medan[4];
		    $pilihan_D  = $medan[5];
		    $jawapan  = $medan[6];
		    $markah  = $medan[7];
		    $id_guru  = $medan[8];
		    $id_kuiz  = $medan[9];
		    $jenis  = $medan[10];
		    $sql = "insert into soalan values('$id_soalan','$nama_soalan','$pilihan_A','$pilihan_B','$pilihan_C', '$pilihan_D', '$jawapan', '$markah', '$id_guru','$id_kuiz', '$jenis')";
			$result = mysqli_query($sambungan, $sql);
		}
	}
?>
<link rel="stylesheet" href="borang.css">

<div class="kandungan"> 
	<div id="berjaya" style="display: none;">
		<h3>MESSAGE</h3> 
		<h2 class="mesej">YES! Successfully Imported<br>Please check the information on the list to double confirm</h2> 
	</div> 

	<div id="tidak" style="display: none;">
		<h3>MESSAGE</h3>
		<h2 class="mesej">Owhh NO! Failed to be Imported</h2>
	</div>
</div>

<?php 
	if ($result == true)
	    echo "<script>document.getElementById('berjaya').style.display='block';</script>";
	else
		echo "<script>document.getElementById('tidak').style.display='block'; </script>";
?>
