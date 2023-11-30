<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from tb_user where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$data1 = mysqli_fetch_assoc($data);
	print_r($data1);
	if ($data1['hak_akses'] == "admin") {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['id'] = $data1['id'];
		$_SESSION['hak_akses'] = $data1['hak_akses'];
		header("location:admin/admin/");
	} else {
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "login";
		$_SESSION['id'] = $data1['id'];
		$_SESSION['hak_akses'] = $data1['hak_akses'];
		header("location:admin/user/");
	}
} else {
	header("location:login.php?pesan=gagal");
}
