<?php
    
    session_start();
    $status = $_SESSION["status"];
    $nama = $_SESSION["nama"];

    echo"
    <link rel='stylesheet' href='menu.css'>
    <div>
    <h1>Main<br>
        Menu</h1>
    <h2>$nama</h2>
    ";

    if($status == "guru") 
    echo'
    <ul>
      <li><a href="home.html" target=kandungan>Home</a></li>
      <li><a href="menu_guru.html" target=menu>Teacher</a></li>
      <li><a href="menu_murid.html" target=menu>Student</a></li>
      <li><a href="menu_kelas.html" target=menu>Class</a></li>
      <li><a href="menu_soalan.html" target=menu>Questions</a></li>
      <li><a href="laporan_pilihan.php" target=kandungan>Report</a></li>
      <li><a href="import.html" target=kandungan>Import</a></li>
      <li><a href="logout.php" target="_top">Log Out</a></li>
    </ul>
    </div>';
    
    else 
    echo' 
    <ul>
      <li><a href="home.html" target=kandungan>Home</a></li>
      <li><a href="jawab_mula.php" 
      target=kandungan>Quiz</a></li>
      <li><a href="logout.php" target="_top">Log Out</a></li>
    </ul>
    </div>';
?>

