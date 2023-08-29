<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>CHOOSE TEACHER</h3>
	<form action="guru_update2.php"method="post">
		<table>
			<tr>
				<td>Teacher Name</td>
				<td>
					<select name="id_guru">
						<?php
							$sql = "select * from guru";
							$data = mysqli_query($sambungan, $sql);
							while($guru = mysqli_fetch_array($data)){
								echo "<option value='$guru[id_guru]'>$guru[nama_guru]</option>";
							}
						?>
					</select>
				</td>
		</table>
		<button class="cari"type="submit">FIND</button>
	</form>

	<?php
		if (isset($_POST['id_guru'])) {
			$id_guru = $_POST["id_guru"];
			$sql = "SELECT * FROM guru WHERE id_guru = '$id_guru'";
			$result = mysqli_query($sambungan, $sql);
			$guru = mysqli_fetch_array($result);

			$id_guru = $guru["id_guru"];
			$nama_guru = $guru["nama_guru"];
		}
		else {
			$id_guru = "";
			$nama_guru = "";
		}
	?>

	<h3>UPDATE TEACHER</h3>
	<form action="guru_update.php"method="post">
		<table>
			<tr>
				<td>Teacher ID</td>
				<td><input type="text"name="id_guru"value='<?php echo $id_guru ?>'></td>
			</tr>

			<tr>
				<td>Teacher Name</td>
				<td><input type="text"name="nama_guru"
					value='<?php echo $nama_guru ?>'></td>
			</tr>
		</table>
		<button class="update"type="submit">UPDATE</button>
	</form>
</div>