<?php
//session_start();


include_once "database.php";
include_once "fungsi.php";
//include_once "import/excel_reader2.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title>Login Page</title>
        <link href="images/icon/login.gif" rel="shortcut icon" />
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="assets/css/style.css" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--OVERWRITE STYLE-->
        <style>
            .navbar-inverse .navbar-brand{
                color: #fff;
            }
        </style>
    </head>
    <body>
        <!-- HEADER END-->
        <!-- <div class="navbar navbar-inverse" style="border-radius:0; margin-bottom:0;">
            <div class="container">
            <span class="navbar-brand" style="font-weight:600; letter-spacing:1px;">Klasifikasi Naïve Bayes</span>
            <ul class="nav navbar-nav navbar-right" style="margin-top:8px;">
            <li><a href="index.php" style="color:#fff;">Beranda</a></li>
            <?php if (empty($_SESSION['kepribadian_naive_bayes_id'])): ?>
            <li><a class="menu-top-active" href="login.php" style="color:#fff;">Masuk</a></li>
            <li><a href="signup.php" style="color:#fff;">Daftar</a></li>
            <?php endif; ?>
            </ul>
            </div>
        </div> -->
<?php
        include "header.php";

        $menu = ''; //variable untuk menampung menu
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
        }
        ?>
<div class="content-wrapper">
    <div class="container">
        
        <?php
        //object database class
        $db_object = new database();

        $pesan_error = $pesan_success = "";
        if (isset($_GET['pesan_error'])) {
            $pesan_error = $_GET['pesan_error'];
        }
        if (isset($_GET['pesan_success'])) {
            $pesan_success = $_GET['pesan_success'];
        }

        if (isset($_POST['submit'])) {
            $sql1 = "INSERT INTO users "
                    . " (nama, username, password, level)"
                    . " VALUES (\"".$_POST['nama']."\", \"".$_POST['user_name']."\", md5(\"".$_POST['user_name']."\"), 2)";
            $result1 = $db_object->db_query($sql1);
            $id_usernya = $db_object->db_insert_id();
            
            $sql = "INSERT INTO data_siswa "
                . " (nama_siswa, jenis_kelamin, usia, jurusan, id_user)"
                . " VALUES "
                . " (\"".$_POST['nama']."\", \"".$_POST['jenis_kelamin']."\", \"".$_POST['usia']."\","
                    . " \"".$_POST['jurusan']."\", $id_usernya)";
            $result = $db_object->db_query($sql);
            
            
            if($result && $result1){
                ?>
                <script> location.replace("?menu=data_siswa&pesan_success=Data berhasil disimpan");</script>
                <?php
            }
            else{
                ?>
                <script> location.replace("?menu=data_siswa&pesan_error=Data gagal disimpan");</script>
                <?php
            }
        }

        if (isset($_GET['delete'])) {
            $id_delete = $_GET['delete'];
            $id_usere = get_id_user_siswa($db_object, $id_delete);

            // Hapus data terkait di tabel data_uji
            $sql = "DELETE FROM data_uji WHERE id=" . $id_delete;
            $db_object->db_query($sql);

            // Hapus data terkait di tabel Jawaban_kuisioner
            $sql = "DELETE FROM Jawaban_kuisioner WHERE id_siswa=" . $id_delete;
            $db_object->db_query($sql);

            // Hapus data di tabel data_siswa
            $sql = "DELETE FROM data_siswa WHERE id=" . $id_delete;
            $db_object->db_query($sql);

            // Hapus data di tabel users
            $sql = "DELETE FROM users WHERE id_user=" . $id_usere;
            $db_object->db_query($sql);
            ?>
            <script> location.replace("?menu=data_siswa&pesan_success=Data siswa berhasil dihapus");</script>
            <?php
        }

        $sql = "SELECT siswa.*, usr.username FROM data_siswa siswa, users usr
                WHERE siswa.`id_user` = usr.`id_user`";
        $query = $db_object->db_query($sql);
        $jumlah = $db_object->db_num_rows($query);
        ?>

        <div class="row justify-content-center" style="display: flex; justify-content: center;">
            <div class="col-md-6" style="float:none; margin:0 auto;">
            <div class="panel panel-default" style="margin-top:30px;">
                <div class="panel-heading text-center">
                <h1>Form Pendaftaran Siswa</h1>
                </div>
                <div class="panel-body">
                <form method="post" action="">
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" id="nama" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="user_name">Username</label>
                    <input name="user_name" id="user_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_l" value="L" required>
                        <label class="form-check-label" for="jk_l">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk_p" value="P" required>
                        <label class="form-check-label" for="jk_p">Perempuan</label>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="usia">Usia</label>
                    <input name="usia" id="usia" type="number" min="1" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Jurusan</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jurusan" id="jurusan_ipa" value="IPA" required>
                        <label class="form-check-label" for="jurusan_ipa">IPA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jurusan" id="jurusan_ips" value="IPS" required>
                        <label class="form-check-label" for="jurusan_ips">IPS</label>
                    </div>
                    </div>
                    <div class="form-group text-right">
                    <button name="submit" type="submit" class="btn btn-success">Daftar</button>
                    </div>
                </form>
                <?php
                if (!empty($pesan_error)) {
                    display_error($pesan_error);
                }
                if (!empty($pesan_success)) {
                    display_success($pesan_success);
                }
                echo "<div class='alert alert-info' style='margin-top:15px;'>Jumlah siswa ter   data: " . $jumlah . "</div>";
                ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

