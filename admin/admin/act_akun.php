<?php
include '../../koneksi.php';

if ($_GET['act'] == 'tambah') {
    $username   = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];

    $sql    = 'insert into tb_user (username,password,hak_akses) values ("' . $username . '","' . $password . '","' . $hak_akses . '")';
    $query  = mysqli_query($koneksi, $sql);

    if ($query) {
        header('location: akun.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
    } else {
        echo 'Gagal';
    }
} else if ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hak_akses = $_POST['hak_akses'];


    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_user SET username='$username' , password='$password' , hak_akses='$hak_akses' WHERE id='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:akun.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} else if ($_GET['act'] == 'delete') {
    $id = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id = '$id'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:akun.php");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
