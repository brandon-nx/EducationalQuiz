<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="senarai.css">
<div class="kandungan"> 
	<table>
		<caption>LIST OF CLASSES</caption>
		<tr>
			<th>Class ID</th>
			<th>Class Name</th>
		</tr>

		//List out all the classes
		<?php
			include('sambungan.php');

			$sql = 'select id_kelas, nama_kelas from kelas';

			$result = mysqli_query($sambungan,$sql);
			while($row=mysqli_fetch_array($result)) {
			echo '<tr> 
					<td>'.$row["id_kelas"].'</td> 
					<td>'.$row["nama_kelas"].'</td> 
				  </tr>';
	    }
	?>
</table>
</div>