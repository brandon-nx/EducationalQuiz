<?php
    include('keselamatan.php');
    include ('header.php');
    include('sambungan.php');
    include('menu_murid.php');

    $id_kuiz = $_GET['id_kuiz'];
?>

<link rel="stylesheet"href="senarai.css">
<link rel="stylesheet"href="button.css">

<div class = "kandungan">
    <form action="jawab_semak.php"method="post">
        <table>
            <caption>ONLINE QUIZ QUESTIONS</caption>
            <tr> 
                <td>No</td>
                <td>Question</td>
            </tr>
            <?php
                $sql = "select * from soalan where id_kuiz = '$id_kuiz' order by id_soalan ASC";
                $data = mysqli_query($sambungan, $sql);
                $bil = 1;
                while ($soalan = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td class = "bil"><?php echo $bil; ?></td>
                <td class = "soalan">

                    <?php
                    $jenis = $soalan['jenis'];
                    if ($jenis == 1)
                        echo "
                        $soalan[nama_soalan]<br>
                        <input type=radio name=$soalan[id_soalan] value=A>A. $soalan[pilihan_A]<br>
                        <input type=radio name=$soalan[id_soalan] value=B>B. $soalan[pilihan_B]<br>
                        <input type=radio name=$soalan[id_soalan] value=C>C. $soalan[pilihan_C]<br>
                        <input type=radio name=$soalan[id_soalan] value=D>D. $soalan[pilihan_D]<br>
                        <input type=hidden name=id_kuiz value=$id_kuiz>
                        ";

                    else if($jenis == 2)
                        echo "
                        $soalan[nama_soalan]<br>
                        <input type=radio name=$soalan[id_soalan] value=TRUE>TRUE<br>
                        <input type=radio name=$soalan[id_soalan] value=FALSE>FALSE<br>
                        <input type=hidden name=id_kuiz value=$id_kuiz>
                        ";

                    else if($jenis == 3)
                        echo "
                        $soalan[nama_soalan]<br>
                        <input type=text name=$soalan[id_soalan] <br>
                        <input type=hidden name=id_kuiz value=$id_kuiz>
                        ";
                    ?>
                </td>
            </tr>
            <?php $bil = $bil + 1; } ?>
        </table>
        <button class="semak" type="submit">Submit</button>
    </form>
</div>



