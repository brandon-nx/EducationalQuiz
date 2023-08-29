
<?php
	include('sambungan.php');
	if(isset($_POST['id_murid'])) {
		$id_murid = $_POST["id_murid"];
		$nama_murid = $_POST["nama_murid"];
	    $id_kelas = $_POST["id_kelas"];
	    $password_murid = $_POST["password_murid"];
		$sql = "insert into murid values('$id_murid', '$nama_murid', '$id_kelas', '$password_murid')";
		$result = mysqli_query($sambungan, $sql);
		if ($result)
			echo "<script>alert('Berjaya signup')</script>";
		else 
		 	echo "<script>alert('Tidak berjaya signup')</script>";
		echo "<script>window.location='login.php'</script>";
		
	}
?>

<link rel="stylesheet"href="borang.css">
<link rel="stylesheet"href="button.css">
<link rel="stylesheet"href="menu.css">

<video id="background-video" src="mainbg.mp4" autoplay loop playsinline muted></video>

<body>
	<center>
	<img src='tajuk.png'>
    </centre>

    <h3>SIGN UP</h3>
    <form action="signup.php"method="post">
    <table>
    	<tr>
			<td>ID</td>
			<td><input type="text" name="id_murid" placeholder="Eg: M001"pattern="[0-9]{4}"oninvalid="this.setCustomValidity('Please put 4 character')"oninput="this.setCustomValidity('')"required></td> 
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="nama_murid"oninvalid="this.setCustomValidity('Please put a name')"oninput="this.setCustomValidity('')"required></td> 
		</tr>

		<tr>
			<td>Class</td>
			<td>
				<select name="id_kelas">
					<?php
					$sql = "select * from kelas";
					$data = mysqli_query($sambungan, $sql);
					while ($kelas = mysqli_fetch_array($data)) {
						echo "<option value='$kelas[id_kelas]'>$kelas[nama_kelas]</option>";
					}
					?>
				</select>
			</td> 
		</tr>
		
		<tr>
			<td>Password</td>
			<td><input type="password" name="password_murid"oninvalid="this.setCustomValidity('Please put a password')"oninput="this.setCustomValidity('')"required></td>
		</tr>
	</table>
	<button class="tambah"type="submit">Register</button>
	<button class="padam"type="button" onclick="window.location='login.php'">Back</button>
</form>
</body>




