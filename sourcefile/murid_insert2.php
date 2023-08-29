<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>ADD NEW STUDENT</h3>
	<form action="murid_insert.php"method="post">
		<table>
			<tr>
				<td>Student ID</td>
				<td>
					<input type="text" name="id_murid"placeholder="Eg: M001"pattern="[A-Z0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>

			<tr>
				<td>Student Name</td>
				<td>
					<input type="text" name="nama_murid"oninvalid="this.setCustomValidity('Please put a name')"oninput="this.setCustomValidity('')"required>
				</td> 
			</tr>

			<tr>
				<td>Class</td>
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
			</tr>

			<tr>
				<td>Password</td>
				<td>
					<input type="text" name="password_murid"oninvalid="this.setCustomValidity('Please put a password')"oninput="this.setCustomValidity('')"required>
				</td> 
			</tr>
		</table>
		<button class="tambah"type="submit">ADD</button>
	</form>
</div>