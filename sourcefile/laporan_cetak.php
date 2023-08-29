<?php
    include('keselamatan.php');
    include('header.php');
    include('menu_guru.php');
    include('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">
<div class="kandungan">
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Class</th>
            <th>Date</th>
            <th>Quiz</th>
            <th>Marks Obtained</th>
        </tr>

        <?php
            $pilih=$_POST["pilih"];
            $id_kelas=$_POST["id_kelas"];
            $markah_perolehi=$_POST["markah_perolehi"];
            
            $sql="select*from pelaksanaan_kuiz
                join murid on pelaksanaan_kuiz.id_murid = murid.id_murid
                join kelas on murid.id_kelas = kelas.id_kelas 
                join soalan on pelaksanaan_kuiz.id_soalan = soalan.id_soalan
                join kuiz on soalan.id_kuiz = kuiz.id_kuiz
                group by murid.id_murid,kuiz.id_kuiz";

            switch($pilih){
                case 1:$syarat="";
                       $tajuk="OVERALL ACHIEVEMENT"; break;
                    
                case 2:$syarat="having kelas.id_kelas='$id_kelas'";
                       $tajuk="ACHIEVEMENT ACCORDING TO CLASS"; break;
                    
                case 3:
                        if($markah_perolehi==80){
                            $syarat="having markah_perolehi>=80";
                            $tajuk="ACHIEVEMENT MORE THAN 80%";
                        }
                        else if($markah_perolehi==50){
                            $syarat="having markah_perolehi>=50";
                            $tajuk="ACHIEVEMENT MORE THAN 50%";
                        }
                        else if($markah_perolehi==0){
                            $syarat="having markah_perolehi<50";
                            $tajuk="ACHIEVEMENT LESS THAN 50%";
                        }
                        break;
                case 4:
                        if($markah_perolehi==80){
                            $syarat="having markah_perolehi>=80 and kelas.id_kelas='".$id_kelas."'";
                            $tajuk="ACHIEVEMENT ACCORDING TO ALL CLASSES AND MORE THAN 80%";
                        }
                        else if($markah_perolehi==50){
                            $syarat="having markah_perolehi>=50 and kelas.idkelas='".$idkelas."'";
                            $tajuk="ACHIEVEMENT ACCORDING TO ALL CLASSES AND MORE THAN 50%";
                        }
                        else if($markah_perolehi==0){
                            $syarat="having markah_perolehi<50 and kelas.idkelas='".$idkelas."'";
                            $tajuk="ACHIEVEMENT ACCORDING TO ALL CLASSES AND LESS THAN 50%";
                        }
                        break;
            }
            $bil=1;
            $sql=$sql.$syarat; // cantum
            $data=mysqli_query($sambungan,$sql);
                while($pelaksanaan_kuiz=mysqli_fetch_array($data)) {
        ?>

            <tr>
                <td><?php echo $bil;?></td>
                <td><?php echo $pelaksanaan_kuiz['nama_murid'];?></td> 
                <td><?php echo $pelaksanaan_kuiz['nama_kelas'];?></td>
                <td><?php echo $pelaksanaan_kuiz['tarikh_jawab'];?></td>
                <td><?php echo $pelaksanaan_kuiz['nama_kuiz'];?></td>
                <td><?php echo $pelaksanaan_kuiz['markah_perolehi'];?></td>
            </tr>
            
        <?php
            $bil=$bil+1;
            } //tamat while
        ?>
        <caption><?php echo $tajuk;?></caption>
    </table>
    <center>
        <button class="cetak" onclick="window.print()">PRINT</button>
    </center>
</div>