<?php
    include("keselamatan.php");
    include("header.php");
    include("menu_murid.php");
    include("sambungan.php");


    $id_murid = $_SESSION['username'];
    if(isset($_POST['id_kuiz'])) {
        $id_kuiz =$_POST['id_kuiz'];
        $sql = "select * from pelaksanaan_kuiz join soalan on pelaksanaan_kuiz.id_soalan = soalan.id_soalan where id_murid = '".$id_murid."' and soalan.id_kuiz='".$id_kuiz."'";
        $data = mysqli_query($sambungan,$sql);

        //semak sama ada pelajar telah jawab atau belum
        if(mysqli_num_rows($data) > 0)
            header("Location:jawab_ulangkaji.php?id_kuiz=$id_kuiz");
        else
            header("Location:jawab_soalan.php?id_kuiz=$id_kuiz");
    }
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<div class="kandungan"> 
    <h3>PLEASE CHOOSE A QUIZ TOPIC</h3>
    <form action="jawab_mula.php" method="post">
        <table>
            <tr>
                <td>Quiz Topic</td>
                <td>
                <select class="kuiz" name="id_kuiz">
                    <?php
                        $sql = "select * from kuiz";
                        $data = mysqli_query($sambungan,$sql);
                        while($kuiz = mysqli_fetch_array($data)) {
                            echo "<option value='$kuiz[id_kuiz]'>$kuiz[nama_kuiz]</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
        </table>
        <button class="semak" type="submit">START</button>
    </form>
</div>