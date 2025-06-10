<?php
//session_start();
if (!isset($_SESSION['kepribadian_naive_bayes_id'])) {
    header("location:index.php?menu=forbidden");
}

include_once "database.php";
include_once "fungsi.php";
include_once "import/excel_reader2.php";
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Data Latih</h4>
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
            $data = new Spreadsheet_Excel_Reader($_FILES['file_data_latih']['tmp_name']);

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
                    $sql = "INSERT INTO data_latih "
                        . " (nama, jenis_kelamin, usia, jurusan, jawaban_a, jawaban_b, jawaban_c, jawaban_d, kelas_asli)"
                        . " VALUES ".$value;
                    $result = $db_object->db_query($sql);
                }
            }
            //$values = implode(",", $value);
            
            if($result){
                ?>
                <script> location.replace("?menu=data_latih&pesan_success=Data berhasil disimpan");</script>
                <?php
            }
            else{
                ?>
                <script> location.replace("?menu=data_latih&pesan_error=Data gagal disimpan");</script>
                <?php
            }
        }

        if (isset($_POST['delete'])) {
            $sql = "TRUNCATE data_latih";
            $db_object->db_query($sql);
            ?>
            <script> location.replace("?menu=data_latih&pesan_success=Data latih berhasil dihapus");</script>
            <?php
        }

        $sql = "SELECT * FROM data_latih";
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
                            <input name="file_data_latih" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" value="Upload Data" class="btn btn-success">
                    
                        <button name="delete" type="submit"  class="btn btn-danger" onclick="">
                            <i class="fa fa-trash-o"></i> Hapus Semua
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
                            <th>opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        while ($row = $db_object->db_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td>
                                <?php
                                    if ($row['jenis_kelamin'] == 'L') {
                                        echo 'Laki-laki';
                                    } elseif ($row['jenis_kelamin'] == 'P') {
                                        echo 'Perempuan';
                                    } else {
                                        echo htmlspecialchars($row['jenis_kelamin']);
                                    }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['usia']); ?></td>
                            <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                            <td><?php echo htmlspecialchars($row['jawaban_a']); ?></td>
                            <td><?php echo htmlspecialchars($row['jawaban_b']); ?></td>
                            <td><?php echo htmlspecialchars($row['jawaban_c']); ?></td>
                            <td><?php echo htmlspecialchars($row['jawaban_d']); ?></td>
                            <td><?php echo htmlspecialchars($row['kelas_asli']); ?></td>
                            <td>
                                <a href="?menu=data_latih&delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                                <!-- Tombol Edit yang memicu modal -->
                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>">
                                    Edit
                                </button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <form method="post" action="">
                                        <div class="modal-header">
                                          <h4 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Data Latih</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option value="Laki-laki" <?php if($row['jenis_kelamin']=='Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                                                    <option value="Perempuan" <?php if($row['jenis_kelamin']=='Perempuan') echo 'selected'; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Usia</label>
                                                <input type="number" name="usia" class="form-control" value="<?php echo $row['usia']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jurusan</label>
                                                <input type="text" name="jurusan" class="form-control" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban A</label>
                                                <input type="number" name="jawaban_a" class="form-control" value="<?php echo $row['jawaban_a']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban B</label>
                                                <input type="number" name="jawaban_b" class="form-control" value="<?php echo $row['jawaban_b']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban C</label>
                                                <input type="number" name="jawaban_c" class="form-control" value="<?php echo $row['jawaban_c']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jawaban D</label>
                                                <input type="number" name="jawaban_d" class="form-control" value="<?php echo $row['jawaban_d']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas Asli</label>
                                                <input type="text" name="kelas_asli" class="form-control" value="<?php echo htmlspecialchars($row['kelas_asli']); ?>" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" name="update_modal" class="btn btn-primary">Update</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <?php
                                // Proses update data dari modal
                                if (isset($_POST['update_modal']) && isset($_POST['edit_id'])) {
                                    $edit_id = intval($_POST['edit_id']);
                                    $nama = $_POST['nama'];
                                    // Konversi nilai jenis kelamin ke L/P
                                    $jenis_kelamin_input = $_POST['jenis_kelamin'];
                                    if ($jenis_kelamin_input === 'Laki-laki' || $jenis_kelamin_input === 'L') {
                                        $jenis_kelamin = 'L';
                                    } elseif ($jenis_kelamin_input === 'Perempuan' || $jenis_kelamin_input === 'P') {
                                        $jenis_kelamin = 'P';
                                    } else {
                                        $jenis_kelamin = '';
                                    }
                                    $usia = intval($_POST['usia']);
                                    $jurusan = $_POST['jurusan'];
                                    $jawaban_a = intval($_POST['jawaban_a']);
                                    $jawaban_b = intval($_POST['jawaban_b']);
                                    $jawaban_c = intval($_POST['jawaban_c']);
                                    $jawaban_d = intval($_POST['jawaban_d']);
                                    $kelas_asli = $_POST['kelas_asli'];

                                    if ($jenis_kelamin !== '') {
                                        $sql_update = "UPDATE data_latih SET 
                                            nama = '$nama',
                                            jenis_kelamin = '$jenis_kelamin',
                                            usia = $usia,
                                            jurusan = '$jurusan',
                                            jawaban_a = $jawaban_a,
                                            jawaban_b = $jawaban_b,
                                            jawaban_c = $jawaban_c,
                                            jawaban_d = $jawaban_d,
                                            kelas_asli = '$kelas_asli'
                                            WHERE id = $edit_id";
                                        $db_object->db_query($sql_update);
                                        echo "<script>location.replace('?menu=data_latih&pesan_success=Data berhasil diupdate');</script>";
                                        exit;
                                    } else {
                                        echo "<script>alert('Jenis kelamin tidak valid!');</script>";
                                    }
                                }
                                ?>

                                <script>
                                // Untuk mengubah input kelas_asli menjadi dropdown pada modal edit
                                document.addEventListener('DOMContentLoaded', function() {
                                    var modal = document.getElementById('editModal<?php echo $row['id']; ?>');
                                    if (modal) {
                                        var input = modal.querySelector('input[name="kelas_asli"]');
                                        if (input) {
                                            var select = document.createElement('select');
                                            select.name = 'kelas_asli';
                                            select.className = 'form-control';
                                            var options = ['Sanguinis', 'Koleris', 'Melankolis', 'Plegmatis'];
                                            options.forEach(function(opt) {
                                                var option = document.createElement('option');
                                                option.value = opt;
                                                option.text = opt;
                                                if (input.value === opt) option.selected = true;
                                                select.appendChild(option);
                                            });
                                            input.parentNode.replaceChild(select, input);
                                        }
                                    }
                                });
                                </script>

                            </td>
                        </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
// Proses hapus data berdasarkan id
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $sql = "DELETE FROM data_latih WHERE id = $delete_id";
    $db_object->db_query($sql);
    echo "<script>location.replace('?menu=data_latih&pesan_success=Data berhasil dihapus');</script>";
    exit;
}

// Proses edit data
if (isset($_GET['menu']) && $_GET['menu'] == 'edit_data_latih' && isset($_GET['id'])) {
    $edit_id = intval($_GET['id']);
    $sql = "SELECT * FROM data_latih WHERE id = $edit_id";
    $result = $db_object->db_query($sql);
    $edit_data = $db_object->db_fetch_array($result);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $usia = intval($_POST['usia']);
        $jurusan = $_POST['jurusan'];
        $jawaban_a = intval($_POST['jawaban_a']);
        $jawaban_b = intval($_POST['jawaban_b']);
        $jawaban_c = intval($_POST['jawaban_c']);
        $jawaban_d = intval($_POST['jawaban_d']);
        $kelas_asli = $_POST['kelas_asli'];

        $sql_update = "UPDATE data_latih SET 
            nama = '$nama',
            jenis_kelamin = '$jenis_kelamin',
            usia = $usia,
            jurusan = '$jurusan',
            jawaban_a = $jawaban_a,
            jawaban_b = $jawaban_b,
            jawaban_c = $jawaban_c,
            jawaban_d = $jawaban_d,
            kelas_asli = '$kelas_asli'
            WHERE id = $edit_id";
        $db_object->db_query($sql_update);
        echo "<script>location.replace('?menu=data_latih&pesan_success=Data berhasil diupdate');</script>";
        exit;
    }
    ?>
    <div class="container">
        <h4>Edit Data Latih</h4>
        <form method="post" action="">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?php echo htmlspecialchars($edit_data['nama']); ?>" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki" <?php if($edit_data['jenis_kelamin']=='Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if($edit_data['jenis_kelamin']=='Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Usia</label>
                <input type="number" name="usia" class="form-control" value="<?php echo $edit_data['usia']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" class="form-control" value="<?php echo htmlspecialchars($edit_data['jurusan']); ?>" required>
            </div>
            <div class="form-group">
                <label>Jawaban A</label>
                <input type="number" name="jawaban_a" class="form-control" value="<?php echo $edit_data['jawaban_a']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jawaban B</label>
                <input type="number" name="jawaban_b" class="form-control" value="<?php echo $edit_data['jawaban_b']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jawaban C</label>
                <input type="number" name="jawaban_c" class="form-control" value="<?php echo $edit_data['jawaban_c']; ?>" required>
            </div>
            <div class="form-group">
                <label>Jawaban D</label>
                <input type="number" name="jawaban_d" class="form-control" value="<?php echo $edit_data['jawaban_d']; ?>" required>
            </div>
            <div class="form-group">
                <label>Kelas Asli</label>
                <input type="text" name="kelas_asli" class="form-control" value="<?php echo htmlspecialchars($edit_data['kelas_asli']); ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="?menu=data_latih" class="btn btn-default">Batal</a>
        </form>
    </div>
    <?php
    exit;
}
?>

