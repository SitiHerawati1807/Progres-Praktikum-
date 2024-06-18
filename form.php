<?php
  include "koneksi.php";
  include "tampilkan_data.php";

  $data_edit = [];
  if (isset($_GET['id']) && $_GET['id'] != '') {
      $id = $_GET['id'];
      $query = "SELECT * FROM mahasiswa WHERE id = $id";
      $proses_ambil = mysqli_query($koneksi, $query);
      $data_edit = mysqli_fetch_assoc($proses_ambil);
  }
?>

<html>
<head>
    <title>Input Prodi Mahasiswa</title>
    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">
    <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body>
    <div class="span9" id="content">
        <div class="row-fluid">
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Input Prodi Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="<?php echo isset($data_edit['id']) ? 'edit_data.php?id=' . $data_edit['id'] . '&proses=1' : 'proses.php'; ?>" method="POST">
                            <fieldset>
                                <legend>
                                    <h2>Input Prodi Mahasiswa</h2>
                                </legend>

                                <div class="control-group">
                                    <label class="control-label" for="nama">NAMA MAHASISWA:</label>
                                    <div class="controls">
                                        <input type="hidden" class="input-xlarge focused" id="id" name="id" value="<?php echo isset($data_edit['id']) ? $data_edit['id'] : ''; ?>">
                                        <input type="text" class="input-xlarge focused" id="nama" name="nama" value="<?php echo isset($data_edit['nama_mahasiswa']) ? $data_edit['nama_mahasiswa'] : ''; ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="prodi">PRODI MAHASISWA:</label>
                                    <div class="controls">
                                        <select class="input-xlarge focused" id="prodi" name="prodi">
                                            <option value="Informatika" <?php echo (isset($data_edit['prodi']) && $data_edit['prodi'] == "Informatika") ? "selected" : ""; ?>>Informatika</option>
                                            <option value="Sistem_Informasi" <?php echo (isset($data_edit['prodi']) && $data_edit['prodi'] == "Sistem_Informasi") ? "selected" : ""; ?>>Sistem Informasi</option>
                                            <option value="Kedokteran" <?php echo (isset($data_edit['prodi']) && $data_edit['prodi'] == "Kedokteran") ? "selected" : ""; ?>>Kedokteran</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="ulangi">ULANGI:</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge focused" id="ulangi" name="ulangi" value="">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">PROSES</button>
                                    <button type="reset" class="btn">Cancel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>NPM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Prodi Mahasiswa</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($data = mysqli_fetch_assoc($proses)){
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['id'] ?></td>
                                                    <td><?php echo $data['nama_mahasiswa'] ?></td>
                                                    <td><?php echo $data['prodi'] ?></td>
                                                    <td><a href="form.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="hapus_data.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>    
        </div>    
    </div>       
</body>
</html>