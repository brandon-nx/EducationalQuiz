<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan"> 
	<h3>ADD NEW CLASS</h3>
	<form action="kelas_insert.php"method="post">
		<table>
			<tr>
				<td>Class ID</td>
				<td>
					<input type="text"name="id_kelas"placeholder="Eg: K001"pattern="[A-Z0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>

			<tr>
				<td>Class Name</td>
				<td>
					<input type="text"name="nama_kelas"oninvalid="this.setCustomValidity('Please put a name')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>
		</table>
		<button class="tambah"type="submit">ADD</button>
	</form>
</div>