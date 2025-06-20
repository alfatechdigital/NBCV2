<?php 
$menu = '';
if(isset($_GET['menu'])){
    $menu = $_GET['menu'];
}

?>
        <!-- HEADER END-->
        <div class="navbar navbar-inverse set-radius-zero">
            <div class="container">
                <div class="navbar-brand">
                Klasifikasi Naïve Bayes
                </div>
            </div>
        </div>

<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a <?php echo ($menu==''||$menu=='home')?"class='menu-top-active'":""; ?> 
                             href="index.php">Beranda</a></li>
                        <?php
                        if (empty($_SESSION['kepribadian_naive_bayes_id'])) {
                        ?>
                            <li><a href="login.php">Masuk</a></li>
                            <li><a href="signup.php" style="color:#fff;">Daftar</a></li>
                        <?php 
                        }
                        else{
                            if($_SESSION['kepribadian_naive_bayes_level'] == 2){
                                ?>
                                <li><a <?php echo ($menu=='klasifikasi')?"class='menu-top-active'":""; ?>
                                        href="index.php?menu=klasifikasi">Klasifikasi</a></li>
                                <?php
                            }
                            else{
                                ?>
                                <li><a <?php echo ($menu=='data_siswa')?"class='menu-top-active'":""; ?> 
                                        href="index.php?menu=data_siswa">Data Siswa</a></li>
                                <li><a <?php echo ($menu=='data_latih')?"class='menu-top-active'":""; ?>
                                        href="index.php?menu=data_latih">Data Latih</a></li>
                                <li><a <?php echo ($menu=='data_soal')?"class='menu-top-active'":""; ?>
                                        href="index.php?menu=data_soal">Data Soal</a></li>
                                <li><a <?php echo ($menu=='uji_akurasi')?"class='menu-top-active'":""; ?> 
                                        href="index.php?menu=uji_akurasi">Uji Akurasi</a></li>
                                <li><a <?php echo ($menu=='laporan_hasil')?"class='menu-top-active'":""; ?> 
                                        href="index.php?menu=laporan_hasil">Hasil Klasifikasi</a></li>
                                <?php
                            }
                            ?>
                            <li><a href="logout.php">Keluar</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- MENU SECTION END-->