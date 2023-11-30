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
	include 'koneksi.php';
	// Load file koneksi.php
	$id = $_GET['id'];
	$query = "SELECT * FROM tb_capaian INNER JOIN tb_pk ON tb_capaian.id_pk=tb_pk.id WHERE id_user=" . $id . " ORDER BY id_pk,tanggal ASC";
	?>
	<h1>Laporan Data Penilaian Kinerja</h1>
	<table border="1" cellpadding="8">
		<tr>
			<th width='20' align='center'>No</th>
			<th width='80' align='center'>Sasaran</th>
			<th width='50' align='center'>Kode</th>
			<th width='120' align='center'>Indikator Kinerja</th>
			<th width='50' align='center'>Target</th>
			<th width='60' align='center'>Capaian</th>
			<th width='120' align='center'>Permasalahan</th>
			<th width='120' align='center'>Tindak Lanjut</th>
			<th width='100' align='center'>Evaluasi</th>
			<th width='90' align='center'>Tanggal</th>
			<th width='120' align='center'>Keterangan</th>
			<th width='60' align='center'>PIC</th>
		</tr>

		<?php
		$count = 1;
		$temp = 0;
		$sql = mysqli_query($koneksi, $query);
		while ($data = mysqli_fetch_array($sql)) {
			if ($data['id_pk'] != $temp) {
				echo "<tr>";
				echo "<td width='20' align='center'>" . $count++ . "</td>";
				echo "<td width='80' align='center'>" . $data['sasaran'] . "</td>";
				echo "<td width='50' align='center'>" . $data['kode'] . "</td>";
				echo "<td width='120' align='center'>" . $data['indikator_kerja'] . "</td>";
				echo "<td width='50' align='center'>" . $data['target'] . "</td>";
				echo "<td width='60' align='center'>" . $data['capaian'] . "</td>";
				echo "<td width='120' align='center'>" . $data['permasalahan'] . "</td>";
				echo "<td width='120' align='center'>" . $data['tindak_lanjut'] . "</td>";
				echo "<td width='100' align='center'>" . $data['evaluasi'] . "</td>";
				echo "<td width='90' align='center'>" . $data['tanggal'] . "</td>";
				echo "<td width='120' align='center'>" . $data['keterangan'] . "</td>";
				echo "<td width='60' align='center'>" . $data['PIC'] . "</td>";
				echo "</tr>";
				$temp = $data['id_pk'];
			} else if ($data['id_pk'] == $temp) {
				echo "<tr>";
				echo "<td width='20' align='center'></td>";
				echo "<td width='80' align='center'></td>";
				echo "<td width='50' align='center'></td>";
				echo "<td width='120' align='center'></td>";
				echo "<td width='50' align='center'></td>";
				echo "<td width='60' align='center'>" . $data['capaian'] . "</td>";
				echo "<td width='120' align='center'>" . $data['permasalahan'] . "</td>";
				echo "<td width='120' align='center'>" . $data['tindak_lanjut'] . "</td>";
				echo "<td width='100' align='center'>" . $data['evaluasi'] . "</td>";
				echo "<td width='90' align='center'>" . $data['tanggal'] . "</td>";
				echo "<td width='120' align='center'>" . $data['keterangan'] . "</td>";
				echo "<td width='60' align='center'></td>";
				echo "</tr>";
			}
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

$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('Data Laporan.pdf', 'D');
?>