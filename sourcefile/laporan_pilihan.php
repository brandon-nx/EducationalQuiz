<?php
    include('keselamatan.php');
    include('header.php');
    include('menu_guru.php');
    include('sambungan.php');
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
    <div class="kandungan">
    <h3>TYPE OF REPORTS</h3>
    <form action="laporan_cetak.php" method="post">
        <select id='pilih' name='pilih'>
            <option value=1>All Class and Result</option>
            <option value=2>According to Class</option>
            <option value=3>According to Result</option>
            <option value=4>According to All Class and Result</option>
        </select><br>
        
        <div id="kelas" style="display: none;">
            <select name="id_kelas">
            <?php
                $sql = "select * from kelas";
                $data = mysqli_query($sambungan, $sql);
                while ($kelas = mysqli_fetch_array($data)) {
                    echo "<option value='$kelas[id_kelas]'>$kelas[nama_kelas]</option>";
                }
            ?>
            </select>
        </div>
        
        <div id="markah_perolehi" style="display: none;">
            <select name="markah_perolehi">
                <option value=80>More than 80</option>
                <option value=50>More than 50</option>
                <option value=0>Less than 50</option>
            </select>
        </div>
        <button class="papar" type="submit">SHOW</button>
    </form>
    
    <script>
        document.getElementById('pilih').addEventListener('change',function() {
            var paparKelas = 'none';
            var paparMarkah_perolehi = 'none';
            var pilih = this.value;
            
            
            if (pilih == 1) {
                paparKelas = 'none';
                paparMarkah_perolehi = 'none';
            }
            else if (pilih == 2) {
                paparKelas = 'block';
                paparMarkah_perolehi = 'none';
            }
            else if (pilih == 3) {
                paparKelas = 'none';
                paparMarkah_perolehi = 'block';
            }
            else if (pilih == 4) {
                paparKelas = 'block';
                paparMarkah_perolehi = 'block';
            }
            document.getElementById('kelas').style.display = paparKelas;
            document.getElementById('markah_perolehi').style.display = paparMarkah_perolehi;
        });

</script>
</div>