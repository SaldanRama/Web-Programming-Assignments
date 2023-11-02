<?php
   include 'fungsi.php';
    session_start();


   if(isset($_POST['aksi'])){
    if($_POST['aksi'] == "add") {
        $nim = $_POST['nim'];
        // Periksa apakah NIM sudah ada di database
        if(cari_nim_di_database($nim)) {
            echo "<script>
                    alert('NIM yang Anda Masukkan Sudah Ada!');
                    window.location.href = 'edit.php';
                  </script>";
        } else {
            $berhasil = tambah_data($_POST);
            if($berhasil) {
                $_SESSION['eksekusi'] = "Data Berhasil Di Tambah!";
                echo "<script>
                        alert('Data berhasil disubmit!');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo $berhasil;
            }
        }
    } else if($_POST['aksi'] == "edit") {
        $nim = $_POST['nim'];
        $id = $_POST['id'];
            $berhasil = ubah_data($_POST);
            if($berhasil) {
                $_SESSION['eksekusi'] = "Data Berhasil Di DiUbah!";
                echo "<script>
                        alert('Data berhasil diubah!');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo $berhasil;
            }
        }
    }


    if(isset($_GET['delete'])){
        $berhasil = hapus_data($_GET);
        if($berhasil){
            $_SESSION['eksekusi'] = "Data Berhasil Di Hapus!";
            header("location: index.php");
        }else {
            echo $berhasil;
        }
    }

?>