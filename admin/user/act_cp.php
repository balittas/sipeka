<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../../login.php?pesan=belum_login");
}

if ($_GET['act'] == 'tambah') {
    $sasaran         = $_POST['sasaran'];
    $capaian         = $_POST['capaian'];
    $permasalahan    = $_POST['permasalahan'];
    $tindak_lanjut   = $_POST['tindak_lanjut'];
    $evaluasi        = $_POST['evaluasi'];
    $tanggal         = $_POST['tanggal'];
    $keterangan      = $_POST['keterangan'];

    $sql    = 'INSERT INTO `tb_capaian` (`id_pk`, `capaian`, `permasalahan`, `tindak_lanjut`, `evaluasi`, `tanggal`, `keterangan`) VALUES  ("' . $sasaran . '","' . $capaian . '","' . $permasalahan . '","' . $tindak_lanjut . '", "' . $evaluasi . '", "' . $tanggal . '", "' . $keterangan . '")';
    $query  = mysqli_query($koneksi, $sql);

    if ($query) {
        header('location: cp.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
    } else {
        echo 'Gagal';
    }
} elseif ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $capaian   = $_POST['capaian'];
    $permasalahan = $_POST['permasalahan'];
    $tindak_lanjut  = $_POST['tindak_lanjut'];
    $evaluasi = $_POST['evaluasi'];
    $tanggal         = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_capaian SET capaian='$capaian' , permasalahan='$permasalahan' , tindak_lanjut='$tindak_lanjut', evaluasi='$evaluasi',tanggal='$tanggal',keterangan='$keterangan' WHERE id='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:cp.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'delete') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_capaian WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:cp.php");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
