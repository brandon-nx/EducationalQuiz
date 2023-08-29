<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>CHOOSE QUIZ TOPIC</h3>
	<form action="kuiz_update2.php"method="post">
		<table>
			<tr>
				<td>Quiz Topic</td>
				<td>
					<select name="id_kuiz">
						<?php
							$sql = "select * from kuiz";
							$data = mysqli_query($sambungan, $sql);
							while($kuiz = mysqli_fetch_array($data)){
								echo "<option value='$kuiz[id_kuiz]'>$kuiz[nama_kuiz]</option>";
							}
						?>
					</select>
				</td>
		</table>
		<button class="cari"type="submit">FIND</button>
	</form>

	<?php
		if (isset($_POST['id_kuiz'])) {
			$id_kuiz = $_POST["id_kuiz"];
			$sql = "SELECT * FROM kuiz WHERE id_kuiz = '$id_kuiz'";
			$result = mysqli_query($sambungan, $sql);
			$kuiz = mysqli_fetch_array($result);

			$id_kuiz = $kuiz["id_kuiz"];
			$nama_kuiz = $kuiz["nama_kuiz"];
		}
		else {
			$id_kuiz = "";
			$nama_kuiz = "";
		}
	?>

	<h3>UPDATE QUIZ TOPIC</h3>
	<form action="kuiz_update.php"method="post">
		<table>
			<tr>
				<td>Quiz ID</td>
				<td>
					<input type="text"name="id_kuiz"value='<?php echo $id_kuiz ?>'>
				</td>
			</tr>

			<tr>
				<td>Quiz Name</td>
				<td>
					<input type="text"name="nama_kuiz"value='<?php echo $nama_kuiz ?>'>
				</td>
			</tr>
		</table>
		<button class="update"type="submit">UPDATE</button>
	</form>
</div>