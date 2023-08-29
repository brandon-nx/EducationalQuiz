<?php 
include ('sambungan.php'); 
session_start();

if (isset($_POST['userid'])) {
	$userid= $_POST['userid'];
	$password = $_POST['password'];

	$sql="select * from murid";
	$result = mysqli_query($sambungan, $sql);
	$jumpa = FALSE;
	while($murid = mysqli_fetch_array($result)) {
   		if($murid['id_murid'] == $userid && $murid["password_murid"] == $password) {
	   		   $jumpa = TRUE;
	   		   $_SESSION['username'] = $murid['id_murid'];
	   		   $_SESSION['nama'] = $murid['nama_murid']; 
	   		   $_SESSION['status'] = 'murid';
	   		   break;
   		}
    }

	if ($jumpa == FALSE) {
		$sql = "select * from guru";
		$result = mysqli_query($sambungan, $sql); 
		while($guru = mysqli_fetch_array($result)) { 
			if ($guru['id_guru'] == $userid && $guru["password_guru"] == $password) {
				$jumpa = TRUE; 
				$_SESSION['username'] = $guru['id_guru'];
				$_SESSION['nama'] = $guru['nama_guru'];
				$_SESSION['status'] = 'guru'; 
			break;
			}
		}
	}

	if($jumpa == TRUE) {
		if($_SESSION['status']=='murid')
			header('Location: home_murid.php');
		else
			header('Location: home_guru.php');
	}
	else
		echo " <script>alert('Wrong IC number or password'); 
			window.location='login.php'</script> ";	
}
?> 

<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css"> 
<link rel="stylesheet" href="menu.css">
<video id="background-video" src="mainbg.mp4" autoplay loop playsinline muted></video>
<body>
	<center> 
	<img src='tajuk.png'>
	<h3>SIGN IN</h3> 
	<form action=login.php method=post>
		<table>
			<tr>
				<td>ID</td> 
				<td>
					<input type="text" name="userid" placeholder="Eg: M001">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" placeholder="password">
				</td> 
			</tr> 
		</table> 
		<button class="login" type="submit">Login</button>
		<button class="signup" type="button" onclick="window.location = 'signup.php'">Sign Up</button>
	</form>
</center>
</body>
</html>

 

