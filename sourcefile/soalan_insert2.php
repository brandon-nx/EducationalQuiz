<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>ADD NEW QUESTION</h3>
	<form action="soalan_insert.php"method="post">
		<table>
			<tr>
				<td>Question ID</td>
				<td><input type="text"name="id_soalan"placeholder="Eg: S001"pattern="[A-Z0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required></td>
			</tr>
			<tr>
				<td>Question</td>
				<td><input type="text"name="nama_soalan"oninvalid="this.setCustomValidity('Please put question')"oninput="this.setCustomValidity('')"required></td>
			</tr>			
			<tr>
				<td>Option A</td>
				<td><input type="text"name="pilihan_A"placeholder="Ignore if not objective Qs"></td>
			</tr>
			<tr>
				<td>Option B</td>
				<td><input type="text"name="pilihan_B"placeholder="Ignore if not objective Qs"></td>
			</tr>			

			<tr>
				<td>Option C</td>
				<td><input type="text"name="pilihan_C"placeholder="Ignore if not objective Qs"></td>
			</tr>
			<tr>
				<td>Option D</td>
				<td><input type="text"name="pilihan_D"placeholder="Ignore if not objective Qs"></td>
			</tr>
			<tr>
				<td>Answer</td>
				<td><input type="text"name="jawapan"placeholder="A/B/C/D or TRUE/FALSE or answer"oninvalid="this.setCustomValidity('Please put answer')"oninput="this.setCustomValidity('')"required></td>
			</tr>
			<tr>
				<td>Marks</td>
				<td><input type="text"name="markah"oninvalid="this.setCustomValidity('Please put mark')"oninput="this.setCustomValidity('')"required></td>
			</tr>

			<tr>
				<td>Created By</td>
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
			</tr>

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
			</tr>

			<tr>
				<td>Type of Question</td>
				<td>
					<select name="jenis">
						<option value=1>Objective Qs</option>
						<option value=2>True/False Qs</option>
						<option value=3>Fill in the blank Qs</option>
					</select>
				</td>
			</tr>
		</table>
		<button class="tambah"type="submit">ADD</button>
	</form>
</div>