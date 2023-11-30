<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../../login.php?pesan=belum_login");
}

if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $pk = $_POST['pk'];
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
        header("location:cp.php?pk=$pk");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'delete') {
    $id = $_GET['id'];
    $pk = $_GET['pk'];
    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_capaian WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:cp.php?pk=$pk");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
