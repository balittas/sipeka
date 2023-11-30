<?php ob_start(); ?>
<html>

<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse: collapse;
			table-layout: fixed;
			width: 630px;
		}

		table td {
			word-wrap: break-word;
			width: 20%;
		}
	</style>
</head>

<body>
	<?php
	// Load file koneksi.php
	include 'koneksi.php';
	$id = $_GET['id'];
	$query = "SELECT * FROM tb_pk WHERE id_user =" . $id;
	?>
	<h1>Laporan Data Penilaian Kinerja</h1>
	<table border="1" cellpadding="8">
		<tr>
			<th width='20' align='center'>No</th>
			<th width='170' align='center'>Sasaran</th>
			<th width='80' align='center'>Kode</th>
			<th width='200' align='center'>Indikator Kinerja</th>
			<th width='80' align='center'>Target</th>
			<th width='160' align='center'>PIC</th>
		</tr>

		<?php
		$count = 1;
		$sql = mysqli_query($koneksi, $query);
		while ($data = mysqli_fetch_array($sql)) {
			echo "<tr>";
			echo "<td width='20' align='center'>" . $count++ . "</td>";
			echo "<td width='160' align='center'>" . $data['sasaran'] . "</td>";
			echo "<td width='80' align='center'>" . $data['kode'] . "</td>";
			echo "<td width='200' align='center'>" . $data['indikator_kerja'] . "</td>";
			echo "<td width='80' align='center'>" . $data['target'] . "</td>";
			echo "<td width='160' align='center'>" . $data['PIC'] . "</td>";
			echo "</tr>";
		}
		?>
	</table>
	<p><br>Mengetahui, </p><br>
	<p>Kepala Balai Penelitian Tanaman Pemanis Dan Serat</p>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();


require 'html2pdf_v5.2-master/vendor/autoload.php';

$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Laporan.pdf', 'D');
?>