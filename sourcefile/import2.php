<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan"> 
<h3>IMPORT DATA</h3>
<form action="import.php"method="post"enctype = "multipart/form-data">
	<table>
		<tr>
			<td>Type of Data</td>
			<td>
				<select name="namatable">
					<option>Students</option>
					<option>Questions</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>File Name</td>
			<td><input type="file" name="namafail" accept=".txt"></td>
		</tr>
	</table>
	<button class = "import" type="submit">IMPORT</button>
</form>
</div>
		
