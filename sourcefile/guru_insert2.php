<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>ADD NEW TEACHER</h3>
	<form action="guru_insert.php"method="post">
		<table>
			<tr>
				<td>Teacher ID</td>
				<td>
					<input type="text"name="id_guru"placeholder="Eg: G001"pattern="[A-Z0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>

			<tr>
				<td>Teacher Name</td>
				<td>
					<input type="text"name="nama_guru"oninvalid="this.setCustomValidity('Please put a name')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>	

			<tr>
				<td>Password</td>
				<td>
					<input type="text"name="password_guru"oninvalid="this.setCustomValidity('Please put password')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>
		</table>
		<button class="tambah"type="submit">ADD</button>
	</form>
</div>