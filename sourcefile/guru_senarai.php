<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="senarai.css">
<div class="kandungan"> 
	<table>
		<caption>LIST OF TEACHERS</caption>
		<tr>
			<th>Teacher ID</th>
			<th>Teacher Name</th>
		</tr>

		//List out all the teachers
		<?php
			include('sambungan.php');

			$sql = 'select id_guru, nama_guru from guru';

			$result = mysqli_query($sambungan,$sql);
			while($row=mysqli_fetch_array($result)) {
			echo '<tr> 
					<td>'.$row["id_guru"].'</td> 
					<td>'.$row["nama_guru"].'</td> 
				  </tr>';
	    }
	?>
</table>
</div>