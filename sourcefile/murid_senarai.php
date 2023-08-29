<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="senarai.css">
<div class="kandungan"> 
	<table>
		<caption>LIST OF STUDENTS</caption>
		<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<th>Student Class</th>
		</tr>

		//List out all the students
		<?php
			include('sambungan.php');

			$sql = 'select id_murid, nama_murid, id_kelas from murid';

			$result = mysqli_query($sambungan,$sql);
			while($row=mysqli_fetch_array($result)) {
			echo '<tr> 
					<td>'.$row["id_murid"].'</td> 
					<td>'.$row["nama_murid"].'</td> 
					<td>'.$row["id_kelas"].'</td>
				  </tr>';
	    }
	?>
</table>
</div>