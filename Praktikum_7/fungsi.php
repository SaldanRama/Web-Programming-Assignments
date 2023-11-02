<?php
    include 'koneksi.php';
    function tambah_data($data){
        $nim = $data['nim'];
        $nama_mahasiswa = $data['nama_mahasiswa'];
        $prodi = $data['prodi'];
        $query = "INSERT INTO tb_mahasiswa VALUES('$nama_mahasiswa', '$nim', '$prodi')";
        $sql =  mysqli_query($GLOBALS['conn'], $query);
    
        return true;

    }

    function ubah_data($data){
        $nim = $data['nim'];
        $nim_mahasiswa = $data['nim_mahasiswa'];
        $nama_mahasiswa = $data['nama_mahasiswa'];
        $prodi = $data['prodi'];
        $query = "UPDATE tb_mahasiswa SET nama_mahasiswa='$nama_mahasiswa', nim_mahasiswa='$nim', prodi='$prodi' WHERE nim_mahasiswa='$nim_mahasiswa';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;

    }

    function hapus_data($data){
        $nim = $data['delete'];
        $query = "DELETE FROM tb_mahasiswa WHERE nim_mahasiswa = '$nim';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }



    // Fungsi mengecek apakah NIM sudah Ada di Database Atau Belum
    // hasil ChatGpt
    function cari_nim_di_database($nim, $nim_mahasiswa = null) {
        // Gunakan prepared statement untuk menghindari serangan SQL injection
        $query = "SELECT COUNT(*) FROM tb_mahasiswa WHERE nim_mahasiswa = ?";
        
        // Jika nim_mahasiswa disediakan (pada operasi ubah data), hindari pencarian pada data yang sedang diubah
        if ($nim_mahasiswa) {
            $query .= " AND nim_mahasiswa != ?";
        }
        
        // Persiapkan statement
        $stmt = mysqli_prepare($GLOBALS['conn'], $query);
        
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "s", $nim);
        
        // Jika nim_mahasiswa disediakan, bind parameter tambahan
        if ($nim_mahasiswa) {
            mysqli_stmt_bind_param($stmt, "s", $nim_mahasiswa);
        }
        
        // Eksekusi statement
        mysqli_stmt_execute($stmt);
        
        // Ambil hasil
        mysqli_stmt_bind_result($stmt, $count);
        mysqli_stmt_fetch($stmt);
        
        // Jika ada hasil (NIM sudah ada di database), kembalikan true, jika tidak, kembalikan false
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }
?>