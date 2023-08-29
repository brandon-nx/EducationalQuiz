<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
	include("sambungan.php");
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
	<h3>CHOOSE QUESTION</h3>
	<form action="soalan_update2.php"method="post">
		<table>
			<tr>
				<td>Question</td>
				<td>
					<select name="id_soalan">
						<?php
							$sql = "select * from soalan";
							$data = mysqli_query($sambungan, $sql);
							while($soalan = mysqli_fetch_array($data)){
								echo "<option value='$soalan[id_soalan]'>$soalan[nama_soalan]</option>";
							}
						?>
					</select>
				</td>
		</table>
		<button class="cari"type="submit">FIND</button>
	</form>

	<?php
	//Find the question that need to be updated 
		if (isset($_POST['id_soalan'])) {
			$id_soalan = $_POST["id_soalan"];
			$sql = "SELECT * FROM soalan WHERE id_soalan = '$id_soalan'";
			$result = mysqli_query($sambungan, $sql);
			$soalan = mysqli_fetch_array($result);

			$id_soalan = $soalan["id_soalan"];
			$nama_soalan = $soalan["nama_soalan"];
			$pilihan_A = $soalan["pilihan_A"];
			$pilihan_B = $soalan["pilihan_B"];
			$pilihan_C = $soalan["pilihan_C"];
			$pilihan_D = $soalan["pilihan_D"];
			$jawapan = $soalan["jawapan"];
			$markah = $soalan["markah"];
			$id_guru = $soalan["id_guru"];
			$id_kuiz = $soalan["id_kuiz"];
			$jenis = $soalan["jenis"];
		}
		else {
			$id_soalan = "";
			$nama_soalan = "";
			$pilihan_A = "";
			$pilihan_B = "";
			$pilihan_C = "";
			$pilihan_D = "";
			$jawapan = "";
			$markah = "";
			$id_guru = "";
			$id_kuiz = "";
			$jenis = 0;
		}
	?>

	<h3>UPDATE QUESTION</h3>
	<form action = 'soalan_update.php'method='post'>
		<table>
			<tr>
				<td>Question ID</td>
				<td><input type="text"name="id_soalan"value='<?php echo $id_soalan ?>'></td>
			</tr>
			<tr>
				<td>Question</td>
				<td><input type="text"name="nama_soalan"value='<?php echo $nama_soalan ?>'></td>
			</tr>			
			<tr>
				<td>Option A</td>
				<td><input type="text"name="pilihan_A"value='<?php echo $pilihan_A ?>'></td>
			</tr>
			<tr>
				<td>Option B</td>
				<td><input type="text"name="pilihan_B"value='<?php echo $pilihan_B ?>'></td>
			</tr>			

			<tr>
				<td>Option C</td>
				<td><input type="text"name="pilihan_C"value='<?php echo $pilihan_C ?>'></td>
			</tr>
			<tr>
				<td>Option D</td>
				<td><input type="text"name="pilihan_D"value='<?php echo $pilihan_D ?>'></td>
			</tr>
			<tr>
				<td>Answer</td>
				<td><input type="text"name="jawapan"value='<?php echo $jawapan ?>'></td>
			</tr>
			<tr>
				<td>Marks</td>
				<td><input type="text"name="markah"value='<?php echo $markah ?>'></td>
			</tr>

			<tr>
				<td>Created By</td>
				<td>
					<select name="id_guru">
						<?php
							$sql = "select * from guru";
							$data = mysqli_query($sambungan, $sql);
							while ($guru = mysqli_fetch_array($data)) {
								if ($guru['id_guru']==$id_guru) 
									echo "<option value='$guru[id_guru]'selected>$guru[nama_guru]</option>";
								else
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
							while($kuiz = mysqli_fetch_array($data)) {
								if ($kuiz['id_kuiz']==$id_kuiz)
								echo "<option value='$kuiz[id_kuiz]'selected>$kuiz[nama_kuiz]</option>";
								else
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
						<?php
							if ($jenis == 1)
								echo "<option value=1 selected>Objective Qs</option>";
							else
								echo "<option value=1>Objective Qs</option>";
							if ($jenis_kuiz == 2)
								echo "<option value=2 selected>True/False Qs selected</option>";
							else
								echo "<option value=2>True/False Qs</option>";
							if ($jenis_kuiz == 2)
								echo "<option value=3 selected>Fill in the blank</option>";
							else
								echo "<option value=3>Fill in the blank</option>";
						?>
					</select>
				</td>
			</tr>
		</table>
		<button class="update"type="submit">Update</button>
	</form>
</div>'
