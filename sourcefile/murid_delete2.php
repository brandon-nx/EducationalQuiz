<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan"> 
	<h3>DELETE MURID</h3>
	<form action="murid_delete.php"method="post">
		<table>
			<tr>
				<td>Murid ID</td>
				<td><input type="text"name="id_murid"placeholder='Eg: S001'pattern='[A-Z0-9]{4}'oninvalid="this.setCustomValidity('Please put 4 characters')"oninput="this.setCustomValidity('')"required></td>
			</tr>
		</table>
		<button class="padam"type="submit">DELETE</button>
	</form>
</div>