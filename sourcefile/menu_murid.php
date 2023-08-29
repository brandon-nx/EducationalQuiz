<?php
$nama = $_SESSION['nama'];
?>

<link rel="stylesheet" href="menu.css">
<video id="background-video" src="mainbg.mp4" autoplay loop playsinline muted></video>

<div class="menu">
	<h3 class="menu">Main<br>
	                 Menu</h3>
	<h2 class= "nama"><?php echo $nama; ?></h2>
	
	<div class="menu-area">
		<ul> 
			<li><a href="home_murid.php">Home</a></li>
			<li><a href="jawab_mula.php">Quiz</a></li>
			<li><a href="logout.php">Log Out</a></li>
		</ul>
	</div>
</div>