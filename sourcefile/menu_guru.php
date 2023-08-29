<?php
$nama = $_SESSION['nama'];
?>

<link rel="stylesheet" href="menu.css">

<video id="background-video" src="mainbg.mp4" autoplay loop playsinline muted></video>

<div class="menu">
    <h3 class="menu">Main<br>
                     Menu</h3>
    <h2 class="nama"><?php echo $nama; ?></h2>
    
    <ul>
        <li><a href="home_guru.php">Home</a></li>
        <li><a class="arrow" href="#">Question</a>
            <ul>
                <li><a href="soalan_insert2.php">Add</a></li>
                <li><a href="soalan_update2.php">Update</a></li>
                <li><a href="soalan_delete2.php">Delete</a></li>
                <li><a href="soalan_senarai.php">List</a></li>
                <li><a class="arrow" href="#">Quiz<br>Topic</a>
                    <ul>
                       <li><a href="kuiz_insert2.php">Add</a></li>
                       <li><a href="kuiz_update2.php">Update</a></li>
                       <li><a href="kuiz_delete2.php">Delete</a></li>
                       <li><a href="kuiz_senarai.php">List</a></li>
                    </ul>
               </li>
            </ul>
        </li>
        
        <li><a class="arrow" href="#">Teacher</a>
           <ul>
               <li><a href="guru_insert2.php">Add</a></li>
               <li><a href="guru_update2.php">Update</a></li>
               <li><a href="guru_delete2.php">Delete</a></li>
               <li><a href="guru_jawapan2.php">Delete Student's Answer</a></li>
               <li><a href="guru_senarai.php">List</a></li>
        </ul>
        </li>
    
        <li><a class="arrow" href="#">Student</a>
            <ul>
                <li><a href="murid_insert2.php">Add</a></li>
                <li><a href="murid_update2.php">Update</a></li>
                <li><a href="murid_delete2.php">Delete</a></li>
                <li><a href="murid_senarai.php">List</a></li>
                <li><a class="arrow" href="#">Class</a>
                    <ul>
                        <li><a href="kelas_insert2.php">Add</a></li>
                        <li><a href="kelas_update2.php">Update</a></li>
                        <li><a href="kelas_delete2.php">Delete</a></li>
                        <li><a href="kelas_senarai.php">List</a></li>
                </ul>
                </li>       
                
        </ul>
        </li>
        <li><a href="laporan_pilihan.php">Report</a></li>
        <li><a href="import2.php">Import</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
</div>
                              