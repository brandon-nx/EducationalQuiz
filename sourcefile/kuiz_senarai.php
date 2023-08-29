<?php 
	include("keselamatan.php");
	include("header.php");
	include("menu_guru.php");
?>

<link rel="stylesheet" href="senarai.css">
<div class="kandungan"> 
	<table>
		<caption>LIST OF QUIZ TOPICS</caption>
		<tr>
			<th>Quiz ID</th>
			<th>Quiz Name</th>
		</tr>

		//List out all the Quiz Topics
		<?php
			include('sambungan.php');

			$sql = 'select id_kuiz, nama_kuiz from kuiz';

			$result = mysqli_query($sambungan,$sql);
			while($row=mysqli_fetch_array($result)) {
			echo '<tr> 
					<td>'.$row["id_kuiz"].'</td> 
					<td>'.$row["nama_kuiz"].'</td> 
				  </tr>';
	    }
	?>
</table>
</div>