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
                <h4 class="page-head-line">Uji Akurasi</h4>
            </div>
        </div>
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
            // if(!$input_error){
            $data = new Spreadsheet_Excel_Reader($_FILES['file_data_uji']['tmp_name']);

            $baris = $data->rowcount($sheet_index = 0);
            $column = $data->colcount($sheet_index = 0);
            //import data excel dari baris kedua, karena baris pertama adalah nama kolom
            // $temp_date = $temp_produk = "";
            for ($i=2; $i<=$baris; $i++) {
//                for($c=1; $c<=$column; $c++){
//                    $value[$c] = $data->val($i, $c);
//                }
                if(!empty($data->val($i, 2))){
                    $value = "(\"".$data->val($i, 2)."\", '".$data->val($i, 3)."', "
                            .$data->val($i, 4).", '".$data->val($i, 5)."', "
                            .$data->val($i, 6).", ".$data->val($i, 7).", "
                            .$data->val($i, 8).", ".$data->val($i, 9).", '".$data->val($i, 10)."')";
                    $sql = "INSERT INTO data_uji "
                        . " (nama, jenis_kelamin, usia, jurusan, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli)"
                        . " VALUES ".$value;
                    $result = $db_object->db_query($sql);
                }
            }
            //$values = implode(",", $value);
            
            if($result){
                ?>
                <script> location.replace("?menu=uji_akurasi&pesan_success=Data berhasil disimpan");</script>
                <?php
            }
            else{
                ?>
                <script> location.replace("?menu=uji_akurasi&pesan_error=Data gagal disimpan");</script>
                <?php
            }
        }

        if (isset($_POST['delete'])) {
            $sql = "TRUNCATE data_uji";
            $db_object->db_query($sql);
            ?>
            <script> location.replace("?menu=uji_akurasi&pesan_success=Data uji berhasil dihapus");</script>
            <?php
        }
        
        $sql = "SELECT * FROM data_uji";
        $query = $db_object->db_query($sql);
        $jumlah = $db_object->db_num_rows($query);
        ?>

        <div class="row">
            <div class="col-md-12">
                <!--UPLOAD EXCEL FORM-->
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <div class="input-group">
                            <label>Import data from excel</label>
                            <input name="file_data_uji" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                    
                        <button name="delete" type="submit"  class="btn btn-danger" onclick="">
                            <i class="fa fa-trash-o"></i> Hapus Semua
                        </button>
                    </div>
                    
                    <div class="form-group">
                        <button name="uji_akurasi" type="submit"  class="btn btn-default" onclick="">
                            <i class="fa fa-check"></i> Uji Akurasi
                        </button>
                    </div>
                </form>

                <?php
                if (!empty($pesan_error)) {
                    display_error($pesan_error);
                }
                if (!empty($pesan_success)) {
                    display_success($pesan_success);
                }


                echo "Jumlah data: " . $jumlah . "<br>";
                if ($jumlah == 0) {
                    echo "Data kosong...";
                } 
                else {
                    ?>
                    <strong>DATA UJI:</strong>
                    <table class='table table-bordered table-striped  table-hover'>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>jurusan</th>
                            <th>Jawaban A</th>
                            <th>Jawaban B</th>
                            <th>Jawaban C</th>
                            <th>Jawaban D</th>
                            <th>Kelas Asli</th>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        while ($row = $db_object->db_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>" . $no . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td>" . $row['usia'] . "</td>";
                            echo "<td>" . $row['jurusan'] . "</td>";
                            echo "<td>" . $row['jawaban_a'] . "</td>";
                            echo "<td>" . $row['jawaban_b'] . "</td>";
                            echo "<td>" . $row['jawaban_c'] . "</td>";
                            echo "<td>" . $row['jawaban_d'] . "</td>";
                            echo "<td>" . $row['kelas_asli'] . "</td>";?>
                            <td>
                                <!-- Tombol Edit -->
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                    <i class="fa fa-edit"></i> Edit
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <form method="post" action="">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Data Uji</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="edit_nama" class="form-control" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <input type="text" name="edit_jenis_kelamin" class="form-control" value="<?php echo htmlspecialchars($row['jenis_kelamin']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Usia</label>
                                                <input type="number" name="edit_usia" class="form-control" value="<?php echo htmlspecialchars($row['usia']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <input type="text" name="edit_jurusan" class="form-control" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban A</label>
                                                <input type="number" name="edit_jawaban_a" class="form-control" value="<?php echo htmlspecialchars($row['jawaban_a']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban B</label>
                                                <input type="number" name="edit_jawaban_b" class="form-control" value="<?php echo htmlspecialchars($row['jawaban_b']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban C</label>
                                                <input type="number" name="edit_jawaban_c" class="form-control" value="<?php echo htmlspecialchars($row['jawaban_c']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban D</label>
                                                <input type="number" name="edit_jawaban_d" class="form-control" value="<?php echo htmlspecialchars($row['jawaban_d']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas Asli</label>
                                                <input type="text" name="edit_kelas_asli" class="form-control" value="<?php echo htmlspecialchars($row['kelas_asli']); ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                          <button type="submit" name="update_data_uji" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
<?php
// SQL update logic
if (isset($_POST['update_data_uji'])) {
    $edit_id = $_POST['edit_id'];
    $edit_nama = $_POST['edit_nama'];
    $edit_jenis_kelamin = $_POST['edit_jenis_kelamin'];
    $edit_usia = $_POST['edit_usia'];
    $edit_jurusan = $_POST['edit_jurusan'];
    $edit_jawaban_a = $_POST['edit_jawaban_a'];
    $edit_jawaban_b = $_POST['edit_jawaban_b'];
    $edit_jawaban_c = $_POST['edit_jawaban_c'];
    $edit_jawaban_d = $_POST['edit_jawaban_d'];
    $edit_kelas_asli = $_POST['edit_kelas_asli'];

    $sql_update = "UPDATE data_uji SET 
        nama = '$edit_nama',
        jenis_kelamin = '$edit_jenis_kelamin',
        usia = '$edit_usia',
        jurusan = '$edit_jurusan',
        jawaban_a = '$edit_jawaban_a',
        jawaban_b = '$edit_jawaban_b',
        jawaban_c = '$edit_jawaban_c',
        jawaban_d = '$edit_jawaban_d',
        kelas_asli = '$edit_kelas_asli'
        WHERE id = '$edit_id'";
    $update_result = $db_object->db_query($sql_update);

    if ($update_result) {
        echo '<script>location.replace("?menu=uji_akurasi&pesan_success=Data berhasil diupdate");</script>';
    } else {
        echo '<script>location.replace("?menu=uji_akurasi&pesan_error=Data gagal diupdate");</script>';
    }
}
?>
                               
                            <!-- Tombol Hapus -->
                            <form method="post" action="" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                <input type="hidden" name="hapus_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="hapus_data_uji" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>

                            <?php
                            // Proses hapus data uji
                            if (isset($_POST['hapus_data_uji'])) {
                                $hapus_id = $_POST['hapus_id'];
                                $sql_hapus = "DELETE FROM data_uji WHERE id = '$hapus_id'";
                                $hapus_result = $db_object->db_query($sql_hapus);

                                if ($hapus_result) {
                                    echo '<script>location.replace("?menu=uji_akurasi&pesan_success=Data berhasil dihapus");</script>';
                                } else {
                                    echo '<script>location.replace("?menu=uji_akurasi&pesan_error=Data gagal dihapus");</script>';
                                }
                            }
                            ?>
                            </td>
                            <?php
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </table>
                    
                    <?php
                }
                
                if(isset($_POST['uji_akurasi'])){
                    //proses menghitung naive bayes
                    //loop data uji nya
         
                    $sql_hit = "SELECT * FROM data_uji ";

           
                    $res = $db_object->db_query($sql_hit);
                    $aa = 1;
                        echo "<center>statistika perhitungan data latih
                        </center>";
                        echo "<br>";
                        ProsesNaiveBayesattr(
                            $db_object,
                            $row['id'],
                            $row['jenis_kelamin'],
                            $row['usia'],
                            $row['jurusan'],
                            $row['jawaban_a'],
                            $row['jawaban_b'],
                            $row['jawaban_c'],
                            $row['jawaban_d']
                        );

                    
                    $res = $db_object->db_query($sql_hit);
                    $aa=1;
                    // Bagian 1: Tampilkan data uji
                    
                    while($row = $db_object->db_fetch_array($res)){
                        echo "<h1><b>Data Uji ke-".$aa."</b></h1>";
                        ProsesNaiveBayesprob(
                            $db_object,
                            $row['id'],
                            $row['jenis_kelamin'],
                            $row['usia'],
                            $row['jurusan'],
                            $row['jawaban_a'],
                            $row['jawaban_b'],
                            $row['jawaban_c'],
                            $row['jawaban_d']
                        );
                        $aa++;
                    }

                    // Bagian 2: Proses Naive Bayes untuk setiap data uji
                    // Reset pointer dan counter
                    // $res = $db_object->db_query($sql_hit);
                    // $aa = 1;
                    //     echo "<b>Data Uji probabilitas ke-".$aa."</b>";
                    //     echo "<br>";
                    //     ProsesNaiveBayesattr(
                    //         $db_object,
                    //         $row['id'],
                    //         $row['jenis_kelamin'],
                    //         $row['usia'],
                    //         $row['jurusan'],
                    //         $row['jawaban_a'],
                    //         $row['jawaban_b'],
                    //         $row['jawaban_c'],
                    //         $row['jawaban_d']
                    //     );
                     
                    
                }
                ?>
            </div>
        </div>
    </div>
</div>

