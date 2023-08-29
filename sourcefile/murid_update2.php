<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>CHOOSE STUDENT</h3>
	<form action="murid_update2.php"method="post">
		<table>
			<tr>
				<td>Student Name</td>
				<td>
					<select name="id_murid">
						<?php
							$sql = "select * from murid";
							$data = mysqli_query($sambungan, $sql);
							while($murid = mysqli_fetch_array($data)){
								echo "<option value='$murid[id_murid]'>$murid[nama_murid]</option>";
							}
						?>
					</select>
				</td>
		</table>
		<button class="cari"type="submit">FIND</button>
	</form>

	<?php
		if (isset($_POST['id_murid'])) {
			$id_murid = $_POST["id_murid"];
			$sql = "SELECT * FROM murid WHERE id_murid = '$id_murid'";
			$result = mysqli_query($sambungan, $sql);
			$murid = mysqli_fetch_array($result);

			$id_murid = $murid["id_murid"];
			$nama_murid = $murid["nama_murid"];
			$id_kelas = $murid["id_kelas"];
		}
		else {
			$id_murid = "";
			$nama_murid = "";
			$id_kelas = "";
		}
	?>

	<h3>UPDATE STUDENT</h3>
	<form action="murid_update.php"method="post">
		<table>
			<tr>
				<td>Student ID</td>
				<td>
					<input type="text"name="id_murid"value='<?php echo $id_murid ?>'>
				</td>
			</tr>

			<tr>
				<td>Student Name</td>
				<td>
					<input type="text"name="nama_murid"value='<?php echo $nama_murid ?>'>
				</td>
			</tr>

			<tr>
				<td>Class</td>
				<td>
					<select name="id_kelas">
						<?php
							$sql = "select * from kelas";
							$data = mysqli_query($sambungan, $sql);
							while ($kelas = mysqli_fetch_array($data)) {
								if ($kelas['id_kelas']==$id_kelas) 
									echo "<option value='$kelas[id_kelas]'selected>$kelas[nama_kelas]</option>";
								else
									echo "<option value='$kelas[id_kelas]'>$kelas[nama_kelas]</option>";
							}
						?>
					</select>
				</td>
			</tr>
		</table>
		<button class="update"type="submit">UPDATE</button>
	</form>
</div>