<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>CHOOSE CLASS</h3>
	<form action="kelas_update2.php"method="post">
		<table>
			<tr>
				<td>Class Name</td>
				<td>
					<select name="id_kelas">
						<?php
							$sql = "select * from kelas";
							$data = mysqli_query($sambungan, $sql);
							while($kelas = mysqli_fetch_array($data)){
								echo "<option value='$kelas[id_kelas]'>$kelas[nama_kelas]</option>";
							}
						?>
					</select>
				</td>
		</table>
		<button class="cari"type="submit">FIND</button>
	</form>

	<?php
		if (isset($_POST['id_kelas'])) {
			$id_kelas = $_POST["id_kelas"];
			$sql = "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'";
			$result = mysqli_query($sambungan, $sql);
			$kelas = mysqli_fetch_array($result);

			$id_kelas = $kelas["id_kelas"];
			$nama_kelas = $kelas["nama_kelas"];
		}
		else {
			$id_kelas = "";
			$nama_kelas = "";
		}
	?>

	<h3>UPDATE CLASS</h3>
	<form action="kelas_update.php"method="post">
		<table>
			<tr>
				<td>Class ID</td>
				<td>
					<input type="text"name="id_kelas"value='<?php echo $id_kelas ?>'>
				</td>
			</tr>

			<tr>
				<td>Class Name</td>
				<td>
					<input type="text"name="nama_kelas"value='<?php echo $nama_kelas ?>'>
				</td>
			</tr>

		</table>
		<button class="update"type="submit">UPDATE</button>
	</form>
</div>