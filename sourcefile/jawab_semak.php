<?php 
    include('sambungan.php');
    session_start();

    $id_murid = $_SESSION['username'];
    $id_kuiz = $_POST['id_kuiz'];
    
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $tarikh_jawab = date('d/m/Y');
    $sql = "select * from soalan where id_kuiz = '".$id_kuiz."' order by id_soalan ASC";
    $data = mysqli_query($sambungan, $sql);

    while ($soalan = mysqli_fetch_array($data)) {
        $id_soalan = $soalan['id_soalan'];
        $pilih = $_POST["$id_soalan"];
        $sql = "insert into pelaksanaan_kuiz values('$id_murid', '$id_soalan', '$tarikh_jawab', '$pilih', 0)";
        $datakuiz = mysqli_query($sambungan, $sql);
    }
    header("Location: jawab_ulangkaji.php?id_kuiz=$id_kuiz");
?>