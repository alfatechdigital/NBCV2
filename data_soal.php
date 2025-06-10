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
                <h4 class="page-head-line">Data Soal</h4>
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
                $data = new Spreadsheet_Excel_Reader($_FILES['file_data_soal']['tmp_name']);

                $baris = $data->rowcount($sheet_index = 0);
                $column = $data->colcount($sheet_index = 0);
                //import data excel dari baris kedua, karena baris pertama adalah nama kolom
                // $temp_date = $temp_produk = "";
                for ($i = 2; $i <= $baris; $i++) {
                    $value = "(\"" . $data->val($i, 2) . "\", \"" . $data->val($i, 3) . "\", ".
                            "\"". $data->val($i, 4) . "\", \"" . $data->val($i, 5) . "\")";
                    $sql = "INSERT INTO data_soal "
                            . " (pilihan_a, pilihan_b, pilihan_c, pilihan_d)"
                            . " VALUES " . $value;
                    $result = $db_object->db_query($sql);
                }
                if ($result) {
                    ?>
                    <script> location.replace("?menu=data_soal&pesan_success=Data berhasil disimpan");</script>
                    <?php
                } 
                else {
                    ?>
                     <script> location.replace("?menu=data_soal&pesan_error=Data gagal disimpan");</script> 
                    <?php
                }
            }

            if (isset($_POST['delete'])) {
                $sql = "TRUNCATE data_soal";
                $db_object->db_query($sql);
                ?>
                <script> location.replace("?menu=data_soal&pesan_success=Data soal berhasil dihapus");</script>
                <?php
            }

            $sql = "SELECT soal.* FROM data_soal soal ORDER BY id";
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
                                <input name="file_data_soal" type="file" class="form-control">
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
                    } else {
                        ?>
                        <table class='table table-bordered table-striped  table-hover'>
                            <tr>
                                <th>No</th>
                                <th>Pilihan A</th>
                                <th>Pilihan B</th>
                                <th>Pilihan C</th>
                                <th>Pilihan D</th>
                                <th>OPSI</th>
                            </tr>
    <?php
    $no = 1;
    while ($row = $db_object->db_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $no . "</td>";
        echo "<td>" . $row['pilihan_a'] . "</td>";
        echo "<td>" . $row['pilihan_b'] . "</td>";
        echo "<td>" . $row['pilihan_c'] . "</td>";
        echo "<td>" . $row['pilihan_d'] . "</td>";
       
        ?>
        <td>
        <?php
        // Proses update data soal
        if (isset($_POST['edit_submit'])) {
            $edit_id = intval($_POST['edit_id']);
            $edit_pilihan_a = $_POST['edit_pilihan_a'];
            $edit_pilihan_b = $_POST['edit_pilihan_b'];
            $edit_pilihan_c = $_POST['edit_pilihan_c'];
            $edit_pilihan_d = $_POST['edit_pilihan_d'];

            $sql_update = "UPDATE data_soal SET pilihan_a='$edit_pilihan_a', pilihan_b='$edit_pilihan_b', "
                    . "pilihan_c='$edit_pilihan_c', pilihan_d='$edit_pilihan_d' WHERE id=$edit_id";
            $db_object->db_query($sql_update);
            echo "<script>location.replace('?menu=data_soal&pesan_success=Data berhasil diupdate');</script>";
        }

        // Proses hapus data soal satuan
        if (isset($_POST['delete_single'])) {
            $delete_id = intval($_POST['delete_id']);
            $sql_delete = "DELETE FROM data_soal WHERE id = $delete_id";
            $db_object->db_query($sql_delete);
            echo "<script>location.replace('?menu=data_soal&pesan_success=Data berhasil dihapus');</script>";
        }
        ?>
        <!-- Tombol Edit (ikon) -->
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>" title="Edit">
            <i class="fa fa-pencil"></i>
        </button>
        <!-- Tombol Hapus (ikon) -->
        <form method="post" action="" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
            <button type="submit" name="delete_single" class="btn btn-danger btn-sm" title="Hapus">
            <i class="fa fa-trash"></i>
            </button>
        </form>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $row['id']; ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post" action="">
                <div class="modal-header">
                  <h4 class="modal-title" id="editModalLabel<?php echo $row['id']; ?>">Edit Data Soal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label>Pilihan A</label>
                        <input type="text" name="edit_pilihan_a" class="form-control" value="<?php echo htmlspecialchars($row['pilihan_a']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan B</label>
                        <input type="text" name="edit_pilihan_b" class="form-control" value="<?php echo htmlspecialchars($row['pilihan_b']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan C</label>
                        <input type="text" name="edit_pilihan_c" class="form-control" value="<?php echo htmlspecialchars($row['pilihan_c']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan D</label>
                        <input type="text" name="edit_pilihan_d" class="form-control" value="<?php echo htmlspecialchars($row['pilihan_d']); ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" name="edit_submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        </td>
        <?php
        
        echo "</tr>";
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

