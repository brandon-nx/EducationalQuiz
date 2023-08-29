<?php
# Memanggil fail header_guru.php 
include('header.php');

#---------- bahagian menyimpan data soalan baru-----
# Menyemak kewujudan data POST 
if(!empty($_POST)) {

    # Mengambil data POST 
    $soalan    = mysqli_real_escape_string($condb,$_POST['soalan']);
    $pilihan_A = mysqli_real_escape_string($condb,$_POST['pilihan_A']);
    $pilihan_B = mysqli_real_escape_string($condb,$_POST['pilihan_B']);
    $pilihan_C = mysqli_real_escape_string($condb,$_POST['pilihan_C']);
    $pilihan_D = mysqli_real_escape_string($condb,$_POST['pilihan_D']);
    $jawapan = mysqli_real_escape_string($condb,$_POST['jawapan']);
    $markah = mysqli_real_escape_string($condb,$_POST['markah']);


    # Menguji jika soalan yang dihasilkan mempunyai gambar 
    if($_FILES['gambar']['size'] != 0) {
        # Bahagian memuatnaik gambar soalan 
        $timestmp         = date("Y-m-dhisA");
        $saiz_fail        = $_FILES['gambar']['size'];
        $nama_fail        = basename($_FILES["gambar"]["name"]);
        $jenis_gambar     = pathinfo($nama_fail,PATHINFO_EXTENSION);
        $lokasi           = $_FILES['gambar']['tmp_name'];
        $nama_baru_gambar = "../images/".$timestmp.".".$jenis_gambar;
        move_uploaded_file($lokasi,$nama_baru_gambar);

        # Arahan untuk menyimpan soalan yang mempunyai gambar 
        $arahan_simpan="insert into soalan 
        (id_soalan, soalan, gambar, pilihan_A, pilihan_B, pilihan_C, pilihan_D, jawapan, markah)
        values 
        ('".$_GET['id_soalan']."','$soalan','$gambar','$pilihan_A','$pilihan_B','$pilihan_C','$pilihan_D', '$jawapan', $'markah')";
    }
    else {
        # arahan untuk menyimpan soalan yang tidak mempunyai gambar 
        $arahan_simpan="insert into soalan 
        (id_soalan, soalan, gambar, pilihan_A, pilihan_B, pilihan_C, pilihan_D, jawapan, markah)
        values 
        ('".$_GET['id_soalan']."','$soalan','$pilihan_A','$pilihan_B','$pilihan_C','$pilihan_D', '$jawapan', $'markah')";
    }

    # Menyemak kewujudan data soalan dan jawapan 
    if(empty($soalan) or empty ($pilihan_A) or empty ($pilihan_B) or empty ($pilihan_C) or empty ($pilihan_D)) {
            die("<script>alert('Sila lengkapkan maklumat');
            window.history.back();</script>");
        }

    # Melaksanakan arahan untuk menyimpan soalan 
        if(mysqli_query($condb,$arahan_simpan)) {
            # Data soalan berjaya disimpan 
            echo "<script>alert('Pendaftaran BERJAYA.');
            window.location.href='soalan_daftar.php?no_set=".$_GET['no_set']."&topik=".$_GET['topik']."';
            </script>";
        }
    }
}
?>

<!-- Bahgaian untuk memaparkan soalan yang telah didaftrakan-->
<h3>Senarai Soalan</h3> 
<?php 
    include('../butang_saiz.php'); ?>
    <table width='100%' border='1' id='besar'>
        <tr> 
            <td>Soalan</td> 
            <td>Gambar Soalan</td> 
            <td bgcolor='cyan'>Jawapan A (Betul)</td> 
            <td bgcolor='pink'>Jawapan B</td>
            <td bgcolor='pink'>Jawapan C</td>
            <td bgcolor='pink'>Jawapan D</td>
        </tr> 

        <tr> 
        <!-- Borang untuk mendaftar soalan baru --> 
            <form action='' method='POST' enctype='multipart/form-data'>
                <td>
                    <textarea name='soalan' rows="4" cols="25"></textarea>
                </td>
                <td>
                    <input type='file' name='gambar'>
                </td>
                <td bgcolor='cyan'>
                    <textarea name='jawapan_a' rows="4" cols="25"></textarea> 
                </td>
                <td bgcolor='pink'>
                    <textarea name='jawapan_b' rows="4" cols="25"></textarea>
                </td>
                <td bgcolor='pink'>
                    <textarea name='jawapan_c' rows="4" cols="25"></textarea>
                </td>
                <td bgcolor='pink'>
                    <textarea name='jawapan_d' rows="4" cols="25"></textarea>
                </td>
                <td>
                    <input type='submit'value='simpan'> 
                </td> 
            </form>
        </tr>

?>

<?php
    #arahan untuk mencari soalan berdasarkan set soalan 
    $arahan_soalan="select* from soalan 
    where no_set = '".$_GET['no_set']."'
    order by no_soalan DESC";

    #melaksanakan arahan mencari soalan 
    $laksana_soalan=mysqli_query($condb,$arahan_soalan);

    # Melaksanakan arahan untuk menyimpan soalan 
        if(mysqli_query($condb,$arahan_simpan)) {
            # Data  soalan berjaya disimpan 
            echo "<script>alert('Pendaftaran BERJAYA.');
            window.location.href='soalan_daftar.php?no_set=".$_GET['no_set']."&topik=".$_GET['topik']."';
            </script>";
        }
        else {
            # data soalan gagal disimpan
            echo "<script>alert('Pendaftaran GAGAL.');
            window.location.href='soalan_daftar.php?no_set=".$_GET['no_set']."&topik=".$_GET['topik']."';
            </script>"; 
        }
?> 

<!-- Bahagian untuk memaparkan soalan yang telah didaftarkan-->
<h3>Senarai Soalan</h3> 
<?php include ('../butang_saiz.php'); ?> 
<table width='100%' border='1' id='besar'> 
    <tr> 
        <td>Soalan</td> 
        <td>Gambar Soalan</td> 
        <td bgcolor='cyan'>Jawapan A (Betul)</td> 
        <td bgcolor='pink'>Jawapan B</td>
        <td bgcolor='pink'>Jawapan C</td>
        <td bgcolor='pink'>Jawapan D</td>
    </tr>
    <tr> 
    <!-- Borang untuk mendaftar soalan baru --> 
        <form action='' method='POST' enctype='multipart/form-data'>
            <td>
                <textarea name='soalan' rows="4" cols="25"></textarea>
            </td>
            <td>
                <input type='file' name='gambar'>
            </td>
            <td bgcolor='cyan'>
                <textarea name='jawapan_a' rows="4" cols="25"></textarea> 
            </td>
            <td bgcolor='pink'>
                <textarea name='jawapan_b' rows="4" cols="25"></textarea>
            </td>
            <td bgcolor='pink'>
                <textarea name='jawapan_c' rows="4" cols="25"></textarea>
            </td>
            <td bgcolor='pink'>
                <textarea name='jawapan_d' rows="4" cols="25"></textarea>
            </td>
            <td>
                <input type='submit'value='simpan'>     
            </td> 
        </form>
    </tr>

<?php
#arahan untuk mencari soalan berdasarkan set soalan 
$arahan_soalan="select* from soalan 
where no_set = '".$_GET['no_set']."'
order by no_soalan DESC"; 

#melaksanakan arahan mencari soalan 
$laksana_soalan=mysqli_query($condb,$arahan_soalan); 

# Mengambil data soalan yang ditemui 
while ($data=mysqli_fetch_array($laksana_soalan)){
    # Mengumpukkan data soalan kepada tatasusunan $data_get
    $data_get=array(
        'no_set'    => $data['no_set'], 
        'no_soalan' => $data['no_soalan'],
        'topik'     => $data['topik'],
        'soalan'    => $data['soalan'],
        'jawapan_a' => $data['jawapan_a'],
        'Jawapan_b' => $data['jawapan_b'],
        'jawapan_c' => $data['jawapan_c'],
        'jawapan_d' => $data['jawapan_d']
    );
    # Memaparkan soalan yang ditemui 
    echo "<tr> 
    <td>".$data['soalan']."</td> 
    <td><img src='".$data['gambar']."' width='50%'></td> 
    <td>".$data['jawapan_a']."</td>
    <td>".$data['jawapan_b']."</td>
    <td>".$data['jawapan_c']."</td>
    <td>".$data['jawapan_d']."</td>
    <td> 

|<a href='soalan_kemaskini.php?".http_build_query($data_get)."'> Kemaskini </a> 

|<a href='padam.php?jadual=soalan&medan=no_soalan&kp=".$data['no_soalan']."'onClick=\"return confirm('Anda pasti anda ingin memadam data ini.')\"> Padam </a>|

</td> 
    </tr>";
}
?>
</table>

<?php include('footer_guru.php'); ?>

        


