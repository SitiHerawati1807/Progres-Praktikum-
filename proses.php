<?php

    include "koneksi.php";

        //mengambil data inputan
        $nama_mahasiswa = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $perulangan = $_POST['ulangi'];

        $proses =  mysqli_query($koneksi,"INSERT INTO mahasiswa (nama_mahasiswa, prodi) 
        VALUES ('".$nama_mahasiswa."','".$prodi."')")
        or die (mysqli_error($koneksi));

        if($proses){
            echo "
                    <script>
                        alert('Data Berhasil Disimpan');
                        window.location.href='form.php';
                        </script>";
        } else echo "<script>
                        alert('Data Gagal Disimpan');
                        window.location.href='form.php';
                    </script>";

?>