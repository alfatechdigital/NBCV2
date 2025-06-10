<?php
//session_start();
if (!isset($_SESSION['kepribadian_naive_bayes_id'])) {
    header("location:index.php?menu=forbidden");
}

include_once "database.php";
include_once "fungsi.php";
include_once "fungsi_proses.php";
include_once "import/excel_reader2.php";
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Klasifikasi</h4>
                <?php
                $db_object = new database();
                $idSiswa = isset($_SESSION['kepribadian_naive_bayes_id_siswa']) ? $_SESSION['kepribadian_naive_bayes_id_siswa'] : 0;
                $sql = "SELECT * FROM data_soal";
                $query = $db_object->db_query($sql);
                $jumlah = $db_object->db_num_rows($query);

                // Ambil jawaban jika sudah pernah mengisi
                $jawaban_siswa = array();
                if ($idSiswa > 0) {
                    $sql_jawaban = "SELECT id_soal, jawaban FROM jawaban_kuisioner WHERE id_siswa = $idSiswa";
                    $query_jawaban = $db_object->db_query($sql_jawaban);
                    while ($row_jawaban = $db_object->db_fetch_array($query_jawaban)) {
                        $jawaban_siswa[$row_jawaban['id_soal']] = $row_jawaban['jawaban'];
                    }
                }

                // Proses update jika user submit ulang
                if (isset($_POST['submit']) && $idSiswa > 0) {
                    // Hapus jawaban lama
                    $db_object->db_query("DELETE FROM jawaban_kuisioner WHERE id_siswa = $idSiswa");
                    // Insert jawaban baru
                    $val_in = $di_jawab_a = $di_jawab_b = $di_jawab_c = $di_jawab_d = array();
                    foreach ($_POST['soal'] as $key => $value) {
                        $val_in[] = "(".$_SESSION['kepribadian_naive_bayes_id'].",".$idSiswa.",".$key.",'".$value."')";
                        if($value=='A') $di_jawab_a[] = $key;
                        if($value=='B') $di_jawab_b[] = $key;
                        if($value=='C') $di_jawab_c[] = $key;
                        if($value=='D') $di_jawab_d[] = $key;
                    }
                    if (!empty($val_in)) {
                        $value_sql_to_in = implode(",", $val_in);
                        $sql_in_jawaban = "INSERT INTO jawaban_kuisioner (id_user, id_siswa, id_soal, jawaban) VALUES ".$value_sql_to_in;
                        $db_object->db_query($sql_in_jawaban);

                        // Hapus hasil klasifikasi lama
                        $db_object->db_query("DELETE FROM data_hasil_klasifikasi WHERE id_siswa = $idSiswa");

                        // Hitung ulang naive bayes
                        $siswa = get_data_siswa($db_object, $idSiswa);
                        $jawaban_a = count($di_jawab_a);
                        $jawaban_b = count($di_jawab_b);
                        $jawaban_c = count($di_jawab_c);
                        $jawaban_d = count($di_jawab_d);
                        $hasil = ProsesNaiveBayes($db_object, 0, $siswa['jenis_kelamin'], $siswa['usia'], $siswa['jurusan'], 
                            $jawaban_a, $jawaban_b, $jawaban_c, $jawaban_d, false);

                        // Simpan hasil baru
                        $sql_in_hasil = "INSERT INTO data_hasil_klasifikasi
                            (id_siswa, jenis_kelamin, usia, jurusan, jawaban_a, jawaban_b, jawaban_c, jawaban_d, 
                            kelas_hasil, nilai_sanguin, nilai_koleris, nilai_melankolis, nilai_plegmatis)
                            VALUES
                            ($idSiswa, '".$siswa['jenis_kelamin']."', ".$siswa['usia'].", '".$siswa['jurusan']."', "
                            .$jawaban_a. ", ".$jawaban_b.", ".$jawaban_c.", ".$jawaban_d.", "
                            . "'".$hasil[0]."', '".$hasil[1]."', '".$hasil[2]."', '".$hasil[3]."', '".$hasil[4]."')";
                        $db_object->db_query($sql_in_hasil);

                        // Hapus data uji lama dan simpan baru
                        $db_object->db_query("DELETE FROM data_uji WHERE nama = '".$siswa['nama_siswa']."' AND jenis_kelamin = '".$siswa['jenis_kelamin']."' AND usia = '".$siswa['usia']."' AND jurusan = '".$siswa['jurusan']."'");
                        $sql_data_uji = "INSERT INTO data_uji"
                            . "(nama, jenis_kelamin, usia, jurusan, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli) "
                            . " VALUES "
                            . " ('".$siswa['nama_siswa']."' , '".$siswa['jenis_kelamin']."' , '".$siswa['usia']."' "
                            . ", '".$siswa['jurusan']."' , '".$jawaban_a."' , '".$jawaban_b."' "
                            . ", '".$jawaban_c."' , '".$jawaban_d."' , '".$hasil[0]."' ) ";
                        $db_object->db_query($sql_data_uji);

                        // Tampilkan hasil
                        echo "<div class='alert alert-success'>";
                        echo "Klasifikasi karakteristik kepribadian Anda: ".$hasil[0]."<br>";
                        echo "Probabilitas:<br>";
                        echo "Nilai Sanguin:".$hasil[1]."<br>";
                        echo "Nilai Koleris:".$hasil[2]."<br>";
                        echo "Nilai Melankolis:".$hasil[3]."<br>";
                        echo "Nilai Plegmatis:".$hasil[4];
                        echo "</div>";
                    }
                    // Ambil ulang jawaban untuk form
                    $jawaban_siswa = array();
                    $sql_jawaban = "SELECT id_soal, jawaban FROM jawaban_kuisioner WHERE id_siswa = $idSiswa";
                    $query_jawaban = $db_object->db_query($sql_jawaban);
                    while ($row_jawaban = $db_object->db_fetch_array($query_jawaban)) {
                        $jawaban_siswa[$row_jawaban['id_soal']] = $row_jawaban['jawaban'];
                    }
                }
                ?>
                <form method="post" action="">
                    <?php
                    // Reset pointer query
                    mysqli_data_seek($query, 0);
                    while($row = $db_object->db_fetch_array($query)){
                        $id_soal = $row['id'];
                        $jawaban = isset($jawaban_siswa[$id_soal]) ? $jawaban_siswa[$id_soal] : '';
                    ?>
                    <label>No. <?php echo $id_soal; ?></label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="soal[<?php echo $id_soal; ?>]" value="A" required=""
                                <?php if($jawaban == 'A') echo 'checked'; ?> />
                            <?php echo $row['pilihan_a']; ?>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="soal[<?php echo $id_soal; ?>]" value="B" required=""
                                <?php if($jawaban == 'B') echo 'checked'; ?> />
                            <?php echo $row['pilihan_b']; ?>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="soal[<?php echo $id_soal; ?>]" value="C" required=""
                                <?php if($jawaban == 'C') echo 'checked'; ?> />
                            <?php echo $row['pilihan_c']; ?>
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="soal[<?php echo $id_soal; ?>]" value="D" required=""
                                <?php if($jawaban == 'D') echo 'checked'; ?> />
                            <?php echo $row['pilihan_d']; ?>
                        </label>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="form-group">
                        <input name="submit" type="submit" value="mulai klasifikasi" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>

        
        
    </div>
</div>

