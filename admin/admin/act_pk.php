<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../../login.php?pesan=belum_login");
}

if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $pk = $_POST['pk'];
    $sasaran = $_POST['sasaran'];
    $kode = $_POST['kode'];
    $indikator_kerja = $_POST['indikator_kerja'];
    $target = $_POST['target'];
    $pic = $_POST['pic'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_pk SET sasaran='$sasaran' , kode='$kode' , indikator_kerja='$indikator_kerja' WHERE id='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:pk.php?pk=$pk");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'delete') {
    $id = $_GET['id'];
    $pk = $_GET['pk'];
    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_pk WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:pk.php?pk=$pk");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
