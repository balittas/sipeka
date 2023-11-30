<?php include 'header.php'; ?>
<?php include '../../koneksi.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <?php
                        $data_akun = mysqli_query($koneksi, "SELECT * FROM tb_user");
                        $jumlah_akun = mysqli_num_rows($data_akun);
                        ?>
                        <h3><?php echo $jumlah_akun; ?></h3>

                        <p>Total Data Akun</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="akun.php" class="small-box-footer">Menuju Data Akun <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Left col -->
            <section class="col connectedSortable">
                <!-- solid sales graph -->
                <div class="box">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">Grafik Perjanjian Kinerja Tahun 2021</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <?php
                        $data = mysqli_query(
                            $koneksi,
                            "SELECT hak_akses FROM tb_user INNER JOIN tb_capaian JOIN tb_pk WHERE tb_pk.id_user=tb_user.id AND tb_capaian.id_pk=tb_pk.id GROUP BY hak_akses"
                        );
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <div>
                                <center>
                                    <h3><?= strtoupper($d['hak_akses']); ?></h3>
                                </center>
                                <div id="bar-chart<?= $d['hak_akses']; ?>"></div>
                            </div>
                    </div>
                <?php } ?>
                <!-- /.box-body -->
                <!-- ./col -->
                </div>
                <!-- /.row -->
        </div>
    </section>
</div>
<script src="../../dist/js/morris.js"></script>
<script src="../../dist/js/raphael.js"></script>
<?php
$data = mysqli_query(
    $koneksi,
    "SELECT id_user,hak_akses FROM tb_user INNER JOIN tb_capaian JOIN tb_pk WHERE tb_pk.id_user=tb_user.id AND tb_capaian.id_pk=tb_pk.id GROUP BY id_user,hak_akses"
);
while ($d = mysqli_fetch_array($data)) {
?>
    <script>
        Morris.Bar({
            element: 'bar-chart<?= $d["hak_akses"] ?>',
            barGap: 4,
            barSizeRatio: 0.4,
            data: [
                <?php
                $data_pk = mysqli_query(
                    $koneksi,
                    "SELECT id_pk, sasaran, target, capaian FROM tb_capaian JOIN tb_pk WHERE (id_pk, capaian) IN (SELECT id_pk, MAX(capaian) AS capaian FROM tb_capaian GROUP BY id_pk) AND tb_capaian.id_pk=tb_pk.id AND id_user=" . $d['id_user']
                );
                while ($d_pk = mysqli_fetch_array($data_pk)) {
                ?> {
                        y: '<?php echo $d_pk["sasaran"]; ?>',
                        a: <?php echo $d_pk["target"]; ?>,
                        b: <?php echo $d_pk["capaian"]; ?>
                    },
                <?php
                }
                ?>
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            ymax: 100,
            labels: ['target', 'capaian'],
        });
    </script>
<?php } ?>
<?php include 'footer.php'; ?>