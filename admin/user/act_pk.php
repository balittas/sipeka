<?php
include '../../koneksi.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../../login.php?pesan=belum_login");
}

if ($_GET['act'] == 'tambah') {
    $sasaran = $_POST['sasaran'];
    $kode = $_POST['kode'];
    $indikator_kerja = $_POST['indikator_kerja'];
    $target = $_POST['target'];
    $pic = $_POST['pic'];

    $sql = 'insert into tb_pk (id_user, sasaran, kode, indikator_kerja, target, pic) values ("' . $_SESSION['id'] . '","' . $sasaran . '","' . $kode . '","' . $indikator_kerja . '", "' . $target . '", "' . $pic . '")';
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header('location: pk.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
    } else {
        echo 'Gagal';
    }
} elseif ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $sasaran = $_POST['sasaran'];
    $kode = $_POST['kode'];
    $indikator_kerja = $_POST['indikator_kerja'];
    $target = $_POST['target'];
    $pic = $_POST['pic'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_pk SET sasaran='$sasaran' , kode='$kode' , indikator_kerja='$indikator_kerja' WHERE id='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:pk.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'delete') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_pk WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:pk.php");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
