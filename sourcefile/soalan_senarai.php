<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="senarai.css">
<div class="kandungan"> 
	<table>
		<caption>LIST OF QUESTIONS</caption>
		<tr>
			<th>Question ID</th>
			<th>Question</th>
			<th>Option A</th>
			<th>Option B</th>
			<th>Option C</th>
			<th>Option D</th>
			<th>Answer</th>
			<th>Marks</th>
			<th>Created By</th>
			<th>Quiz Topic</th>
			<th>Type of Question</th>
		</tr>

		// List out all the questions
		<?php
			include('sambungan.php');

			$sql = 'select id_soalan, nama_soalan, pilihan_A, pilihan_B, pilihan_C, pilihan_D, jawapan, markah, id_guru, id_kuiz, jenis from soalan';

			$result = mysqli_query($sambungan,$sql);
			while($row=mysqli_fetch_array($result)) {
			echo '<tr> 
					<td>'.$row["id_soalan"].'</td> 
					<td>'.$row["nama_soalan"].'</td> 
					<td>'.$row["pilihan_A"].'</td> 
					<td>'.$row["pilihan_B"].'</td> 
					<td>'.$row["pilihan_C"].'</td> 
					<td>'.$row["pilihan_D"].'</td> 
					<td>'.$row["jawapan"].'</td> 
					<td>'.$row["markah"].'</td> 
					<td>'.$row["id_guru"].'</td> 
					<td>'.$row["id_kuiz"].'</td> 
					<td>'.$row["jenis"].'</td> 
				  </tr>';
	    }
	?>
</table>
</div>