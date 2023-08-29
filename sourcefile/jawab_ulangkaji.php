<?php
    include('keselamatan.php');
    include ('header.php');
    include('sambungan.php');
    include('menu_murid.php');

    $id_kuiz = $_GET['id_kuiz'];
?>

<link rel="stylesheet"href="senarai.css">
<div class="kandungan">
    <table>
        <tr>
            <caption>ANSWER SCHEME</caption>
            <th>No</th>
            <th>Question</th>
            <th>Answer Scheme</th>
        </tr>
        <?php
            $jumlah = 0;
            $betul = 0;
            $id_murid=$_SESSION['username'];
            $sql="select * from pelaksanaan_kuiz join soalan on pelaksanaan_kuiz.id_soalan = soalan.id_soalan join kuiz on soalan.id_kuiz = kuiz.id_kuiz where soalan.id_kuiz = '".$id_kuiz."'and id_murid='".$id_murid."'";
            $data = mysqli_query($sambungan,$sql);
            $bil = 1;
            while($pelaksanaan_kuiz=mysqli_fetch_array($data)) {
        ?>

        <tr>
            <td class="bil"><?php echo $bil;?></td>
            <td class="soalan">
                <?php
                $jenis = $pelaksanaan_kuiz['jenis'];
                if ($jenis == 1)
                echo "
                $pelaksanaan_kuiz[nama_soalan]<br>
                <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=A>A. $pelaksanaan_kuiz[pilihan_A]<br>
                <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=B>B. $pelaksanaan_kuiz[pilihan_B]<br>
                <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=C>C. $pelaksanaan_kuiz[pilihan_C]<br>
                <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=D>D. $pelaksanaan_kuiz[pilihan_D]<br>
                ";

                else if($jenis == 2)
                    echo "
                    $pelaksanaan_kuiz[nama_soalan]<br>
                    <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=TRUE>TRUE<br>
                    <input type=radio name=$pelaksanaan_kuiz[id_soalan] value=FALSE>FALSE<br>
                    ";

                else if($jenis == 3)
                    echo "
                    $pelaksanaan_kuiz[nama_soalan]<br>
                    <input type=text name=$pelaksanaan_kuiz[id_soalan]<br>
                    ";
                ?>
            </td>

            <td class="skema">
                <?php
                echo"Answer Scheme:<br>
                    ".$pelaksanaan_kuiz['jawapan']."<br>";
                echo"Your Answer:<br>
                    ".$pelaksanaan_kuiz['pilih']."<br>";
                if(strtolower($pelaksanaan_kuiz['pilih']) == strtolower($pelaksanaan_kuiz['jawapan'])) {
                    echo"<img src='betul.png'";
                    $betul = $betul + 1;
                }
                else 
                    echo"<img src='delete.png'>";
                ?>
            </td>
        </tr>

        <?php
            $id_soalan[$bil-1]=$pelaksanaan_kuiz['id_soalan'];
            $bil=$bil+1;
            $jumlah=$jumlah+1;
            $kuiz=$pelaksanaan_kuiz['nama_kuiz'];
        }
        ?>
    </table>

    <?php
        $markah_perolehi = $betul / $jumlah * 100;
        $salah = $jumlah - $betul;
        for($i=0; $i<count($id_soalan);$i++) {
            $sql="update pelaksanaan_kuiz set markah_perolehi = $markah_perolehi where id_soalan='".$id_soalan[$i]."'and id_murid='".$id_murid."'";
            $data=mysqli_query($sambungan,$sql);
        }
    ?>

    <table>
    <caption>STUDENT ACHIEVEMENT</caption>
        <tr>
            <th class="keputusan">Quiz Topic</th>
            <th class="keputusan"><?php echo $kuiz; ?></th>
        </tr>
        <tr>
            <td class="keputusan">Correct</td>
            <td class="keputusan"><?php echo $betul ?></td>
        </tr>
        <tr>
            <td class="keputusan">Incorrect</td>
            <td class="keputusan"><?php echo $salah ?></td>
        </tr>
        <tr>
            <td class="keputusan">Total Question</td>
            <td class="keputusan"><?php echo $jumlah ?></td>
        </tr>
        <tr>
            <td class="keputusan">Result</td>
            <td class="keputusan"><?php echo number_format($markah_perolehi,0) ?> % </td>
        </tr>
    </table>
</div>