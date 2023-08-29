<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan"> 
	<h3>DELETE STUDENT'S ANSWER</h3>
	<form action="guru_jawapan.php"method="post">
		<table>
			<tr>
				<td>Student ID</td>
				<td>
					<input type="text"name="id_murid"placeholder="Eg: M001"pattern="[A-Z0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required>
				</td>
			</tr>
		</table>
		<button class="padam"type="submit">DELETE</button>
	</form>
</div>